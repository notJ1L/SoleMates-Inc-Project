<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ProductsImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    public function model(array $row): ?Product
    {
        // Resolve category
        $categoryId = null;
        if (!empty($row['category_id']) && is_numeric($row['category_id'])) {
            $categoryId = (int) $row['category_id'];
        } elseif (!empty($row['category_name'])) {
            $category = Category::where('name', trim($row['category_name']))->first();
            $categoryId = $category?->id;
        }

        // Resolve brand
        $brandId = null;
        if (!empty($row['brand_id']) && is_numeric($row['brand_id'])) {
            $brandId = (int) $row['brand_id'];
        } elseif (!empty($row['brand_name'])) {
            $brand = Brand::where('name', trim($row['brand_name']))->first();
            $brandId = $brand?->id;
        }

        if (empty($row['name']) || empty($row['price'])) {
            return null;
        }

        return new Product([
            'name'        => trim($row['name']),
            'description' => trim($row['description'] ?? ''),
            'price'       => (float) $row['price'],
            'category_id' => $categoryId,
            'brand_id'    => $brandId,
            'stock'       => isset($row['stock']) ? (int) $row['stock'] : 0,
        ]);
    }
}
