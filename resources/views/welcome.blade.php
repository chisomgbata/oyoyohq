<x-layout-base>
    <form class="mb-8 p-4 sm:p-6 bg-white rounded-lg shadow" action="#" method="get">
        <div class="flex flex-col md:flex-row md:items-center md:space-x-4 space-y-4 md:space-y-0">
            <div class="flex-grow">
                <label for="search" class="sr-only">Search products</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <input type="search" name="search" id="search"
                           class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 text-gray-900 sm:text-sm transition duration-150 ease-in-out"
                           placeholder="Search for products...">
                </div>
            </div>

            {{--            <div class="md:w-auto w-full">--}}
            {{--                <label for="category" class="sr-only">Category</label>--}}
            {{--                <select id="category" name="category"--}}
            {{--                        class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md transition duration-150 ease-in-out">--}}
            {{--                    <option selected>All Categories</option>--}}

            {{--                    @foreach($categories as $category)--}}
            {{--                        <option value="{{ $category->id }}">{{ $category->name }}</option>--}}
            {{--                    @endforeach--}}

            {{--                </select>--}}
            {{--            </div>--}}
            <button type="submit"

                    class="w-full md:w-auto px-4 py-2.5 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                Search
            </button>
        </div>
    </form>

    <section>
        <h2 class="text-2xl font-semibold text-gray-700 mb-6"> Products</h2>
        <div id="product-grid" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 sm:gap-6">
            @forelse($products as $product)
                <a href="{{ route('products.show', [
                    'product' => $product
                    ]) }}"
                   class="bg-white  rounded-lg shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300 ease-in-out h-full flex flex-col p-2">
                    {{$product->getfirstmedia()->img()->attributes(['class'=> 'aspect-square'])}}
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1 truncate">{{$product->name}}</h3>
                        <p class="text-indigo-600 font-bold text-xl mb-2">${{$product->price}}</p>
                    </div>
                </a>
            @empty
                <div
                    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:outline-hidden">

                    <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round">
                        <path d="M3 3h18v18H3z"/>
                        <path d="M9 9h6v6H9z"/>

                        <span class="mt-2 block text-sm font-semibold text-gray-900">No Products Found</span>
                </div>
            @endforelse

        </div>

        {{$products->links()}}
    </section>
</x-layout-base>
