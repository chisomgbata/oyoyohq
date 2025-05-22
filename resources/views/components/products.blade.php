@php use App\Models\Product; @endphp
@props(['title' => 'Top Products', 'products' => Product::inRandomOrder()->limit(6)->get()])
<section class="py-12 md:py-24 lg:py-32">
    <div class="container px-4 mx-auto">
        <h2 class="text-3xl  font-heading font-semibold text-slate-600 tracking-xs mb-14">
            {{$title}}
        </h2>
        <div class="flex flex-wrap -mx-4 -mb-8">
            @foreach($products as $product)
                <div class="w-full md:w-1/2 lg:w-1/4 px-4 mb-8">
                    <div class="block max-w-sm md:max-w-none mx-auto">
                        <div class="flex items-center h-60 mb-4 bg-slate-100 rounded-xl overflow-hidden">
                            {{$product->getFirstMedia()->img()->attributes(['class'=> 'block'])}}
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="max-w-xs pr-32">
                                <span class="block text-base text-slate-500 mb-1">{{$product->name}}</span>
                                <span class="block text-base text-slate-600">₦{{$product->price}}</span>
                            </div>
                            <div class="flex-shrink-0"><a
                                    class="inline-flex h-10 py-1 px-4 items-center justify-center text-sm font-medium text-purple-500 hover:text-white bg-white border border-purple-500 rounded-sm hover:bg-purple-500 transition duration-200"
                                    href="{{route('products.show', [$product])}}">View</a></div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
</section>
