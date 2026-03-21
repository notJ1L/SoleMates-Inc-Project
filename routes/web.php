<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController as FrontProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\ChartsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;

// Authentication Routes
Route::middleware("guest")->group(function () {
    Route::get("/login", [LoginController::class, "showLoginForm"])->name(
        "login",
    );
    Route::post("/login", [LoginController::class, "login"]);
    Route::get("/register", [
        RegisterController::class,
        "showRegistrationForm",
    ])->name("register");
    Route::post("/register", [RegisterController::class, "register"]);

    // Password Reset Routes
    Route::get("/password/reset", [
        ForgotPasswordController::class,
        "showLinkRequestForm",
    ])->name("password.request");
    Route::post("/password/email", [
        ForgotPasswordController::class,
        "sendResetLinkEmail",
    ])->name("password.email");
    Route::get("/password/reset/{token}", [
        ResetPasswordController::class,
        "showResetForm",
    ])->name("password.reset");
    Route::post("/password/reset", [
        ResetPasswordController::class,
        "reset",
    ])->name("password.update");
});

Route::post("/logout", [LoginController::class, "logout"])
    ->name("logout")
    ->middleware("auth");

// Email verification (auth required)
Route::middleware("auth")->group(function () {
    Route::get("/email/verify", [
        VerificationController::class,
        "notice",
    ])->name("verification.notice");
    Route::get("/email/verify/{id}/{hash}", [
        VerificationController::class,
        "verify",
    ])
        ->middleware(["signed"])
        ->name("verification.verify");
    Route::post("/email/verification-notification", [
        VerificationController::class,
        "resend",
    ])->name("verification.resend");

    // Password confirmation (for sensitive actions)
    Route::get("/password/confirm", [
        ConfirmPasswordController::class,
        "showConfirmForm",
    ])->name("password.confirm");
    Route::post("/password/confirm", [
        ConfirmPasswordController::class,
        "confirm",
    ]);
});

// Image serving route for artisan serve
Route::get("/images/{filename}", function ($filename) {
    $path = public_path($filename);
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path);
})->where("filename", ".*");

// Storage serving route for artisan serve (junctions don't always work with PHP built-in server)
Route::get("/storage/{path}", function ($path) {
    $fullPath = storage_path("app/public/" . $path);
    if (!file_exists($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath);
})
    ->where("path", ".*")
    ->name("storage.serve");

// Home Routes
Route::get("/", [HomeController::class, "index"])->name("home");
Route::get("/search", [HomeController::class, "search"])->name("search");
Route::get("/about", function () {
    return view("about");
})->name("about");

// Product Routes (Frontend)
Route::get("/products", [FrontProductController::class, "index"])->name(
    "products.index",
);
Route::get("/products/{product}", [
    FrontProductController::class,
    "show",
])->name("products.show");

Route::get("/simple-products", [
    FrontProductController::class,
    "simpleIndex",
])->name("products.simple.index");
Route::get("/simple-products/{product}", [
    FrontProductController::class,
    "simpleShow",
])->name("products.simple.show");

// Cart and Checkout Routes (Protected)
Route::middleware(["auth"])->group(function () {
    Route::get("/cart", [CartController::class, "index"])->name("cart.index");
    Route::post("/cart/add/{id}", [CartController::class, "add"])->name(
        "cart.add",
    );
    Route::put("/cart/update", [CartController::class, "update"])->name(
        "cart.update",
    );
    Route::delete("/cart/remove/{id}", [CartController::class, "remove"])->name(
        "cart.remove",
    );
    Route::delete("/cart/clear", [CartController::class, "clear"])->name(
        "cart.clear",
    );

    Route::get("/checkout", [CheckoutController::class, "index"])->name(
        "checkout.index",
    );
    Route::post("/checkout/process", [
        CheckoutController::class,
        "process",
    ])->name("checkout.process");
    Route::get("/checkout/success/{orderId}", [
        CheckoutController::class,
        "success",
    ])->name("checkout.success");

    // Review Routes (frontend - post/update by customers)
    Route::post("/reviews", [ReviewController::class, "store"])->name(
        "reviews.store",
    );
    Route::get("/reviews/{review}/edit", [
        ReviewController::class,
        "edit",
    ])->name("reviews.edit");
    Route::put("/reviews/{review}", [ReviewController::class, "update"])->name(
        "reviews.update",
    );

    // Profile Routes
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit",
    );
    Route::put("/profile", [ProfileController::class, "update"])->name(
        "profile.update",
    );
    Route::get("/profile/orders", [ProfileController::class, "orders"])->name(
        "profile.orders",
    );
    Route::get("/profile/orders/{order}", [
        ProfileController::class,
        "show",
    ])->name("profile.orders.show");
});

// Admin Routes (Protected)
Route::middleware(["auth", "admin"])
    ->prefix("admin")
    ->name("admin.")
    ->group(function () {
        Route::get("/dashboard", [DashboardController::class, "index"])->name(
            "dashboard",
        );

        Route::get("/users/data", [UserController::class, "data"])->name(
            "users.data",
        );
        Route::resource("/users", UserController::class);
        Route::post("/products/import", [
            ProductController::class,
            "import",
        ])->name("products.import");
        Route::get("/products/data", [ProductController::class, "data"])->name(
            "products.data",
        );
        Route::post("/products/{id}/restore", [
            ProductController::class,
            "restore",
        ])->name("products.restore");
        Route::delete("/products/{id}/force-delete", [
            ProductController::class,
            "forceDelete",
        ])->name("products.forceDelete");
        Route::delete("/products/photos/{photo}", [
            ProductController::class,
            "deletePhoto",
        ])->name("products.photos.delete");
        Route::resource("/products", ProductController::class);
        Route::resource("/orders", OrderController::class);

        // Additional user management routes
        Route::post("/users/{user}/deactivate", [
            UserController::class,
            "deactivate",
        ])->name("users.deactivate");
        Route::post("/users/{user}/activate", [
            UserController::class,
            "activate",
        ])->name("users.activate");

        // Order status update
        Route::post("/orders/{order}/status", [
            OrderController::class,
            "updateStatus",
        ])->name("orders.updateStatus");

        // Admin Reviews
        Route::get("/reviews/data", [
            AdminReviewController::class,
            "data",
        ])->name("reviews.data");
        Route::delete("/reviews/{review}", [
            AdminReviewController::class,
            "destroy",
        ])->name("reviews.destroy");
        Route::get("/reviews", [AdminReviewController::class, "index"])->name(
            "reviews.index",
        );

        // Admin Charts
        Route::get("/charts", [ChartsController::class, "index"])->name(
            "charts.index",
        );
        Route::get("/charts/sales-range", [
            ChartsController::class,
            "salesByRange",
        ])->name("charts.salesRange");
    });
