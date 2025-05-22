<?php

use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;

Auth::onceUsingId(1);


Route::get('/', function (Request $request) {
    return view('welcome', [
        'settings' => Setting::all(),
    ]);
})->name('home');

Route::get('/products/{product}', function (Product $product) {
    return view('products.show', [
        'product' => $product,
    ]);
})->name('products.show');

Route::get('/checkout', function () {
    $cart = session()->get('cart', []);
    return view('components.cart', [
        'cart' => $cart,
    ]);
})->name('checkout');

Route::post('/checkout', function (OrderRequest $request) {
    $productsArray = $request->quantities;
    /** @var Collection<Product> $products */
    $products = Product::whereIn('id', array_keys($productsArray))->get();

    $total = $products->reduce(function ($total, $product) use ($productsArray) {
        $quantity = $productsArray[$product->id];
        if ($quantity > 0) {
            return $total + ($product->price * $quantity);
        }
        return $total;
    }, 0);
    $filePath = Storage::putFile('proofs', $request->file('proof'));
    $order = Order::create(array_merge(
        $request->validated(),
        [
            'total' => $total,
            'payment_proof' => $filePath,
        ]
    ));
    $orderItemsToAdd = [];
    foreach ($products as $product) {
        $quantity = $productsArray[$product->id];
        if ($quantity > 0) {
            $orderItemsToAdd[] = [
                'order_id' => $order->id,
                'name' => $product->name,
                'price' => $product->price,
            ];
        }

    }
    $order->orderItems()->createMany($orderItemsToAdd);
    return redirect()->route('success');
})->name('checkout.post');


Route::view('/success', 'success')->name('success');

Route::get('/categories/{category}', function (Category $category) {
    $products = $category->products()->whereNotNull('published_at')->paginate(20);
    return view('category', [
        'products' => $products,
        'title' => $category->name,
    ]);
})->name('categories');


Route::get('/search', function () {
    $products = Product::query()
        ->where('name', 'like', '%' . request('q') . '%')
        ->orWhere('description', 'like', '%' . request('q') . '%')
        ->whereNotNull('published_at')
        ->paginate(20);
    return view('category', [
        'products' => $products,
        'title' => 'Search results for: ' . request('q'),
    ]);
})->name('search');
