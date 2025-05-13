<?php

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;


Route::get('/', function (Request $request) {
    $query = $request->get('search');

    $products = Product::whereNotNull('published_at')
        ->when($query, function ($queryBuilder) use ($query) {
            return $queryBuilder->where('name', 'like', "%{$query}%");
        })
        ->paginate(10);
    return view('welcome', [
        'products' => $products,
    ]);
})->name('home');

Route::get('/products/{product}', function (Product $product) {

    return view('products.show', [
        'product' => $product,
        'inCart' => new CartService()->exists($product->id),
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
    session()->forget('cartItems');
    return redirect()->route('success');
})->name('checkout.post');


Route::view('/success', 'success')->name('success');
