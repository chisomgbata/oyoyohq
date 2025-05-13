<x-layout-base>
    <div class="bg-white rounded-lg shadow-xl p-4 sm:p-6 lg:p-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-12">
            <section aria-labelledby="product-images">
                <h2 id="product-images" class="sr-only">Product Images</h2>
                <div class="image-slider flex overflow-x-auto space-x-4 py-2 scroll-smooth snap-x snap-mandatory">
                    @foreach($product->getMedia() as $media)
                        <div
                            @class(
                            [
                              'w-4/5' => count($product->getMedia()) > 1,
                              'w-full' => count($product->getMedia()) <= 1,
                              "slider-image  flex-shrink-0 rounded-lg overflow-hidden shadow-md"])
                        >
                            {{$media->img()->attributes(['class'=> 'w-full h-auto md:h-[500px] object-contain']) }}
                        </div>

                    @endforeach
                </div>
            </section>

            <section aria-labelledby="product-details" class="mt-6 md:mt-0">
                <h2 id="product-details" class="sr-only">Product Details</h2>

                <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">
                    {{$product->name}}
                </h1>

                <p class="text-3xl font-bold text-indigo-600 mb-6">
                    ${{$product->price}}
                </p>

                <div class="mt-8" x-data>

                    <a
                        x-show="$store.cart.inCart({id: {{ $product->id }}})"
                        href="{{ route('checkout') }}"
                        class="w-full block sm:w-auto underline text-indigo-600 font-semibold text-lg">
                        Proceed To Checkout
                    </a>


                    <button
                        x-show="!$store.cart.inCart({id: {{ $product->id }}})"
                        type="button"

                        x-on:click="$store.cart.add({
                                id: {{ $product->id }},
                                name: '{{ $product->name }}',
                                price: {{ $product->price }},
                                image: '{{ $product->getFirstMediaUrl() }}',
                                quantity: 1
                            })"
                        class="w-full sm:w-auto cursor-pointer bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 px-8 rounded-lg shadow-md hover:shadow-lg transition-all duration-200 ease-in-out text-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Add to Cart
                    </button>


                </div>

                <div class="mt-8 pt-6 border-t border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Product Description</h3>
                    <div class="prose prose-sm">
                        {!! $product->description !!}
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-layout-base>
