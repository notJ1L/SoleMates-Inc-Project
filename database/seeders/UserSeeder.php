<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Order;
use App\Models\Review;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed users with orders and reviews
     */
    public function run(): void
    {
        // Predefined users
        $predefinedUsers = [
            [
                'name' => 'Marcus Aristain',
                'email' => 'm@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'user',
                'phone' => '09171234567',
                'address' => '123 Main Street, Metro City',
                'is_active' => true,
            ],
            [
                'name' => 'Jonel Caisip',
                'email' => 'j@gmail.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'user',
                'phone' => '09179876543',
                'address' => '456 Oak Avenue, Metro City',
                'is_active' => true,
            ],
        ];

        // Create predefined users
        foreach ($predefinedUsers as $userData) {
            $user = User::create($userData);
            $this->createOrdersAndReviews($user);
        }

        // Create random users
        $randomNames = [
            'Emma Johnson', 'Liam Smith', 'Olivia Brown', 'Noah Davis', 'Ava Wilson',
            'Ethan Miller', 'Sophia Garcia', 'Mason Rodriguez', 'Isabella Martinez',
            'William Anderson', 'Mia Taylor', 'James Thomas', 'Charlotte Moore',
            'Benjamin Jackson', 'Amelia White', 'Lucas Harris', 'Harper Martin'
        ];

        for ($i = 0; $i < 5; $i++) {
            $randomName = $randomNames[$i];
            $randomEmail = strtolower(str_replace(' ', '', $randomName)) . rand(100, 999) . '@example.com';
            $randomPhone = '09' . str_pad(rand(1000000, 9999999), 7, '0', STR_PAD_LEFT);
            $randomAddress = rand(100, 999) . ' Random Street, Metro City';

            $user = User::create([
                'name' => $randomName,
                'email' => $randomEmail,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'user',
                'phone' => $randomPhone,
                'address' => $randomAddress,
                'is_active' => true,
            ]);

            $this->createOrdersAndReviews($user);
        }
    }

    /**
     * Create 3 orders and reviews for each user
     */
    private function createOrdersAndReviews(User $user): void
    {
        // Get some sample products (must exist in DB)
        $products = Product::inRandomOrder()->limit(10)->get();
        if ($products->count() < 1) {
            // No products in DB, skip creating order items
            echo "[UserSeeder] No products found in database. Skipping order items.\n";
        }

        // Create 3 orders per user
        for ($orderNum = 1; $orderNum <= 3; $orderNum++) {
            $order = Order::create([
                'user_id' => $user->id,
                'order_number' => 'ORD-' . strtoupper(Str::random(8)),
                'status' => ['pending', 'processing', 'completed'][rand(0, 2)],
                'shipping' => rand(15, 30) + (rand(0, 99) / 100),
                'payment_method' => ['cod', 'paypal', 'credit_card'][rand(0, 2)],
                'shipping_address' => rand(100, 999) . ' Example St, Metro City',
                'shipping_city' => 'Metro City',
                'shipping_postcode' => strval(rand(1000, 9999)),
                'shipping_country' => 'PH',
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]);

            // Add items to order only if products exist
            $orderItems = [];
            if ($products->count() > 0) {
                $itemCount = min($products->count(), rand(1, 3));
                $usedProductIds = [];
                for ($i = 0; $i < $itemCount; $i++) {
                    // Ensure unique product per order
                    $product = $products->whereNotIn('id', $usedProductIds)->random();
                    $usedProductIds[] = $product->id;
                    $quantity = rand(1, 2);
                    $price = $product->price;
                    $orderItems[] = [
                        'product_id' => $product->id,
                        'quantity' => $quantity,
                        'price' => $price,
                    ];
                }
                $order->orderItems()->createMany($orderItems);
            }

            // Create reviews for this order's products
            foreach ($orderItems as $item) {
                $reviewCount = rand(0, 2); // 0-2 reviews per product
                for ($r = 0; $r < $reviewCount; $r++) {
                    Review::create([
                        'user_id' => $user->id,
                        'product_id' => $item['product_id'],
                        'rating' => rand(3, 5), // 3-5 stars
                        'body' => $this->generateReviewComment(),
                        'created_at' => $order->created_at->addDays(rand(1, 7)),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }

    /**
     * Generate realistic review comments
     */
    private function generateReviewComment(): string
    {
        $comments = [
            'Great quality and very comfortable!',
            'Excellent product, worth every penny.',
            'Good value for money, shipping was fast.',
            'Amazing shoes, exactly what I was looking for.',
            'Very satisfied with this purchase.',
            'Highly recommend, fits perfectly.',
            'Perfect for my daily runs.',
            'Stylish and comfortable, love them!',
            'Good build quality, very durable.',
            'Exactly as described, very happy.',
            'Great customer service and product quality.',
            'Best shoes I\'ve owned in years.',
            'Comfortable right out of the box.',
            'Looks even better in person!',
            'Perfect fit, no breaking in needed.',
            'Excellent quality materials used.',
            'Would definitely buy again.',
            'Great for both casual and sport use.',
            'Very impressed with the craftsmanship.',
            'Comfortable for all-day wear.',
            'Stylish design, lots of compliments.',
            'Good traction and support.',
            'Exceeded my expectations!',
        ];

        return $comments[array_rand($comments)];
    }
}
