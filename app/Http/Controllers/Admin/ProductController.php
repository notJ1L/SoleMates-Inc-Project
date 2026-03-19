<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ProductsImport;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.products.index');
    }

    public function data(Request $request)
    {
        $trashed = $request->boolean('trashed');

        $query = Product::withTrashed()
            ->with(['category', 'brand', 'photos'])
            ->when($trashed, fn($q) => $q->onlyTrashed())
            ->when(!$trashed, fn($q) => $q->whereNull('deleted_at'));

        return DataTables::of($query)
            ->addColumn('photo', function ($product) {
                $src = $product->thumbnailUrl();
                if ($src) {
                    return '<img src="' . $src . '" style="width:44px;height:44px;object-fit:cover;border-radius:6px;border:1px solid #E6E0D8;">';
                }
                return '<div style="width:44px;height:44px;background:#F8F5F1;border-radius:6px;border:1px solid #E6E0D8;display:flex;align-items:center;justify-content:center;color:#A09A94;"><i class="bi bi-image"></i></div>';
            })
            ->addColumn('name_col', function ($product) {
                return '<div>
                    <div style="font-weight:600;">' . e($product->name) . '</div>
                    <div style="font-size:0.75rem;color:#A09A94;margin-top:1px;">' . e(\Illuminate\Support\Str::limit($product->description, 45)) . '</div>
                </div>';
            })
            ->addColumn('category_col', function ($product) {
                return '<span class="badge-pill badge-user">' . e($product->category->name ?? 'Uncategorized') . '</span>';
            })
            ->addColumn('brand_col', function ($product) {
                return '<span style="font-size:0.838rem;color:#6B6560;">' . e($product->brand->name ?? '—') . '</span>';
            })
            ->addColumn('price_col', function ($product) {
                return '<span class="mono">₱' . number_format($product->price, 2) . '</span>';
            })
            ->addColumn('stock_col', function ($product) {
                $stock = $product->stock ?? 0;
                $color = $stock == 0 ? 'var(--red)' : ($stock <= 5 ? 'var(--amber)' : 'inherit');
                return '<span class="mono" style="color:' . $color . '">' . $stock . '</span>';
            })
            ->addColumn('status_col', function ($product) {
                $stock = $product->stock ?? 0;
                if ($product->trashed()) {
                    return '<span class="badge-pill badge-inactive">Deleted</span>';
                } elseif ($stock == 0) {
                    return '<span class="badge-pill badge-outofstock">Out of Stock</span>';
                } elseif ($stock <= 5) {
                    return '<span class="badge-pill badge-lowstock">Low Stock</span>';
                }
                return '<span class="badge-pill badge-instock">In Stock</span>';
            })
            ->addColumn('actions', function ($product) {
                if ($product->trashed()) {
                    return '
                        <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                            <form action="' . route('admin.products.restore', $product->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . '
                                <button type="submit" class="action-btn success" title="Restore"><i class="bi bi-arrow-counterclockwise"></i></button>
                            </form>
                            <form action="' . route('admin.products.forceDelete', $product->id) . '" method="POST" onsubmit="return confirm(\'Permanently delete this product? This cannot be undone.\')" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button type="submit" class="action-btn danger" title="Delete Permanently"><i class="bi bi-trash3-fill"></i></button>
                            </form>
                        </div>';
                }
                return '
                    <div style="display:flex;align-items:center;justify-content:flex-end;gap:0.375rem;">
                        <a href="' . route('admin.products.edit', $product) . '" class="action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                        <form action="' . route('admin.products.destroy', $product) . '" method="POST" onsubmit="return confirm(\'Move this product to trash?\')" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="action-btn danger" title="Delete"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>';
            })
            ->rawColumns(['photo', 'name_col', 'category_col', 'brand_col', 'price_col', 'stock_col', 'status_col', 'actions'])
            ->make(true);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create-edit', compact('categories', 'brands'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'price'         => 'required|numeric|min:0',
            'stock'         => 'required|integer|min:0',
            'category_id'   => 'required|exists:categories,id',
            'brand_id'      => 'required|exists:brands,id',
            'cover_photo'   => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos'        => 'nullable|array',
            'photos.*'      => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = \Illuminate\Support\Str::slug($request->name);
        $original = $slug;
        $i = 1;
        while (Product::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $original . '-' . $i++;
        }

        $coverPath = $request->file('cover_photo')->store('product_covers', 'public');

        $product = Product::create([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'brand_id'    => $request->brand_id,
            'slug'        => $slug,
            'image'       => $coverPath,
        ]);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('product_photos', 'public');
                $product->photos()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create-edit', compact('product', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
            'brand_id'    => 'required|exists:brands,id',
            'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'photos'      => 'nullable|array',
            'photos.*'    => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $slug = \Illuminate\Support\Str::slug($request->name);
        $original = $slug;
        $i = 1;
        while (Product::withTrashed()->where('slug', $slug)->where('id', '!=', $product->id)->exists()) {
            $slug = $original . '-' . $i++;
        }

        $data = [
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'category_id' => $request->category_id,
            'brand_id'    => $request->brand_id,
            'slug'        => $slug,
        ];

        if ($request->hasFile('cover_photo')) {
            // Delete old cover
            if ($product->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('cover_photo')->store('product_covers', 'public');
        }

        $product->update($data);

        if ($request->hasFile('photos')) {
            foreach ($request->file('photos') as $photo) {
                $path = $photo->store('product_photos', 'public');
                $product->photos()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete(); // soft delete
        return redirect()->route('admin.products.index')->with('success', 'Product moved to trash.');
    }

    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.products.index')->with('success', 'Product restored successfully.');
    }

    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        if ($product->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
        }
        foreach ($product->photos as $photo) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($photo->image_path);
            $photo->delete();
        }
        $product->forceDelete();
        return redirect()->route('admin.products.index')->with('success', 'Product permanently deleted.');
    }

    public function deletePhoto(\App\Models\ProductPhoto $photo)
    {
        \Illuminate\Support\Facades\Storage::disk('public')->delete($photo->image_path);
        $photo->delete();
        return response()->json(['success' => true]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv|max:2048',
        ]);

        try {
            Excel::import(new ProductsImport, $request->file('file'));
            return redirect()->route('admin.products.index')->with('success', 'Products imported successfully.');
        } catch (\Throwable $e) {
            return redirect()->route('admin.products.index')->with('error', 'Import failed: ' . $e->getMessage());
        }
    }
}

