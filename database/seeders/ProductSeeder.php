<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Nike Dunk Low Retro (Panda)',
                'price' => 115,
                'category' => 'Sneakers',
                'brand' => 'Nike',
                'description' => 'A classic 80s basketball icon featuring crisp leather overlays and a monochrome aesthetic.',
                'stock_label' => 'high',
                'sizes' => 'US Men 6–15',
                'colors' => 'White/Black',
                'image_filename' => 'nike_dunkpanda.avif',
            ],
            [
                'name' => 'Adidas Ultraboost Light',
                'price' => 190,
                'category' => 'Running',
                'brand' => 'Adidas',
                'description' => 'The lightest Ultraboost ever, featuring a Light BOOST midsole for epic energy return.',
                'stock_label' => 'in_stock',
                'sizes' => 'US Men 4–14 / UK 3.5–13',
                'colors' => 'Core Black, Cloud White, Solar Red',
                'image_filename' => 'adidas_ultraboostwhite.avif',
            ],
            [
                'name' => 'New Balance 550',
                'price' => 110,
                'category' => 'Sneakers',
                'brand' => 'New Balance',
                'description' => 'A tribute to the 1989 original pro-ballers, featuring a streamlined silhouette and leather upper.',
                'stock_label' => 'moderate',
                'sizes' => 'US Men 4–14',
                'colors' => 'White/Grey, White/Green, White/Blue',
                'image_filename' => 'nb_550.jpg',
            ],
            [
                'name' => 'Converse Chuck Taylor All Star High Top',
                'price' => 65,
                'category' => 'Sneakers',
                'brand' => 'Converse',
                'description' => 'The original basketball shoe, featuring a durable canvas upper and the iconic ankle patch.',
                'stock_label' => 'very_high',
                'sizes' => 'Unisex 3–13',
                'colors' => 'Black, White, Optical White, Red, Navy',
                'image_filename' => 'converse_allstarred.jpg',
            ],
            [
                'name' => 'Vans Old Skool',
                'price' => 70,
                'category' => 'Sneakers',
                'brand' => 'Vans',
                'description' => 'The classic skate shoe that first bared the iconic side stripe, built with suede and canvas.',
                'stock_label' => 'high',
                'sizes' => 'US Men 3.5–16',
                'colors' => 'Black/White, Navy, Checkerboard',
                'image_filename' => 'vans_oldskool.jpg',
            ],
            [
                'name' => 'Puma Cali Women\'s',
                'price' => 80,
                'category' => 'Sneakers',
                'brand' => 'Puma',
                'description' => 'A West Coast-inspired silhouette with a stacked sole and full leather upper.',
                'stock_label' => 'in_stock',
                'sizes' => 'US Women 5.5–11',
                'colors' => 'Puma White/Black',
                'image_filename' => 'puma_cali.jpg',
            ],
            [
                'name' => 'Reebok Club C 85 Vintage',
                'price' => 90,
                'category' => 'Sneakers',
                'brand' => 'Reebok',
                'description' => 'A 1980s court classic with soft leather and a clean, minimalist design.',
                'stock_label' => 'moderate',
                'sizes' => 'US Men 5–15',
                'colors' => 'Chalk/Alabaster/Green',
                'image_filename' => 'reebok_clubc85.jpg',
            ],
            [
                'name' => 'Asics Gel-Kayano 30',
                'price' => 160,
                'category' => 'Running',
                'brand' => 'Asics',
                'description' => 'Premium stability shoe with 4D GUIDANCE SYSTEM for maximum support and comfort.',
                'stock_label' => 'in_stock',
                'sizes' => 'US Men 7–15',
                'colors' => 'Black/White, French Blue, Sheet Rock',
                'image_filename' => 'asics_gelkayano.webp',
            ],
            [
                'name' => 'Hoka Bondi 8',
                'price' => 165,
                'category' => 'Running',
                'brand' => 'Hoka',
                'description' => 'The ultra-cushioned road shoe with an extended heel and lightweight foam.',
                'stock_label' => 'moderate',
                'sizes' => 'US Men 7–16',
                'colors' => 'Black/Black, Sharkskin, Harbor Mist',
                'image_filename' => 'hoka_bondimen.webp',
            ],
            [
                'name' => 'Dr. Martens 1460 Smooth',
                'price' => 170,
                'category' => 'Boots',
                'brand' => 'Dr. Martens',
                'description' => 'The original 8-eye boot with yellow stitching, grooved sides, and air-cushioned soles.',
                'stock_label' => 'high',
                'sizes' => 'UK 3–13',
                'colors' => 'Black, Cherry Red',
                'image_filename' => 'drmartens_1460.webp',
            ],
        ];

        foreach ($products as $data) {
            $category = Category::firstOrCreate(
                ['name' => $data['category']],
                ['description' => $data['category'] . ' footwear']
            );

            $brand = Brand::firstOrCreate(
                ['name' => $data['brand']],
                ['description' => $data['brand'] . ' footwear']
            );

            $stockMap = [
                'very_high' => 120,
                'high' => 80,
                'moderate' => 40,
                'in_stock' => 60,
            ];

            $stock = $stockMap[$data['stock_label']] ?? 40;

            $product = Product::updateOrCreate(
                ['slug' => Str::slug($data['name'])],
                [
                    'name' => $data['name'],
                    'description' => $data['description'],
                    'price' => $data['price'],
                    'stock' => $stock,
                    'image' => null,
                    'category_id' => $category->id,
                    'brand_id' => $brand->id,
                ]
            );

            $imagePath = 'product_photos/' . $data['image_filename'];

            ProductPhoto::firstOrCreate(
                [
                    'product_id' => $product->id,
                    'image_path' => $imagePath,
                ]
            );
        }
    }
}
