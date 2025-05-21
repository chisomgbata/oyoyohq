<x-layout-base>
    <section>
        <div class="container px-4 mx-auto">
            <div class="max-w-xl mx-auto lg:max-w-6xl">
                <div class="mb-8">
                    <div class="flex flex-wrap items-center gap-2">
                        <div class="flex items-center gap-2">
                            <a class="text-gray-500 text-sm hover:text-gray-500 transition duration-200"
                               href="{{ route('home') }}">Homepage</a>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24"
                                 fill="none">
                                <path
                                    d="M15.1211 12C15.1212 12.1313 15.0954 12.2614 15.0451 12.3828C14.9948 12.5041 14.9211 12.6143 14.8281 12.707L10.5859 16.9497C10.3984 17.1372 10.1441 17.2426 9.87889 17.2426C9.6137 17.2426 9.35937 17.1372 9.17186 16.9497C8.98434 16.7622 8.879 16.5079 8.879 16.2427C8.879 15.9775 8.98434 15.7232 9.17186 15.5357L12.707 12L9.17183 8.46437C8.98431 8.27686 8.87897 8.02253 8.87897 7.75734C8.87897 7.49215 8.98431 7.23782 9.17183 7.05031C9.35934 6.86279 9.61367 6.75744 9.87886 6.75744C10.144 6.75744 10.3984 6.86279 10.5859 7.0503L14.8281 11.293C14.9211 11.3857 14.9949 11.4959 15.0451 11.6173C15.0954 11.7386 15.1212 11.8687 15.1211 12Z"
                                    fill="#A0A5B8"></path>
                            </svg>
                        </div>
                        <a class="text-gray-500 text-sm hover:text-gray-500 transition duration-200"
                           href="#">{{$product->name}}</a>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-4">
                    <div
                        x-data="{ mainImageUrl: '{{ $product->getFirstMediaUrl('default') ?: 'https://placehold.co/800x600/FFFFFF/E2E8F0?text=No+Image' }}' }"
                        class="w-full lg:w-1/2 px-4 mb-12 lg:mb-0">
                        {{--
                            Explanation of x-data:
                            - mainImageUrl: Holds the URL of the currently displayed large image.
                            - Initialized with the first product image or a white placeholder.
                        --}}

                        <div class="flex flex-col-reverse lg:flex-row lg:-mx-3">
                            <div class="w-full lg:w-32 xl:w-40 mt-4 lg:mt-0 lg:px-3">
                                <div
                                    class="flex flex-row lg:flex-col gap-2 lg:gap-3 overflow-x-auto lg:overflow-x-hidden lg:max-h-[500px] lg:overflow-y-auto py-2 lg:py-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 rounded">
                                    {{-- Loop through product images --}}
                                    @forelse ($product->getMedia('default') as $media)
                                        <button
                                            class="flex-shrink-0 lg:flex-shrink rounded-lg lg:rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                            :class="{ 'opacity-100 border-2 border-blue-500': mainImageUrl === '{{ $media->getUrl() }}', 'opacity-50 hover:opacity-100 border-2 border-transparent': mainImageUrl !== '{{ $media->getUrl() }}' }"
                                            @click="mainImageUrl = '{{ $media->getUrl() }}'">
                                            <img
                                                class="w-20 h-20 object-cover rounded-md lg:w-full lg:h-24 lg:rounded-lg"
                                                src="{{ $media->getUrl() }}"
                                                alt="{{ $media->name ?: 'Product thumbnail' }}"/>
                                            {{-- Mobile: w-20 h-20. Desktop: lg:w-full lg:h-24 (adjust height as needed) --}}
                                        </button>
                                    @empty
                                        <div class="p-2 text-sm text-slate-500 lg:w-full">No other images.</div>
                                    @endforelse
                                </div>
                            </div>

                            <div class="w-full lg:flex-1 lg:px-3">
                                <div class="aspect-[4/3] bg-white rounded-xl overflow-hidden shadow-md">
                                    {{--
                                        - aspect-[4/3]: Sets a fixed aspect ratio for the container.
                                        - bg-white: Provides a white background, visible if image is smaller or transparent.
                                        - rounded-xl overflow-hidden: For aesthetics.
                                    --}}
                                    <img :src="mainImageUrl"
                                         onerror="this.onerror=null; this.src='https://placehold.co/800x600/FFFFFF/E2E8F0?text=Image+Not+Found';"
                                         alt="Main product image"
                                         class="w-full h-full object-contain transition-opacity duration-300"
                                         @load="$el.style.opacity = 1" style="opacity:0;"/>
                                    {{-- object-contain: Fits image within bounds, showing bg-white if needed. Added simple fade-in on load. --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/2 px-4">
                        <div class="max-w-lg lg:ml-auto">
                            <h1 class="mb-4 font-heading text-4xl text-gray-700 font-semibold">{{$product->name}}</h1>
                            <p class="mb-6 text-gray-400 text-sm font-medium">{!! $product->description !!}</p>
                            <h2 class="text-gray-700 text-4xl font-semibold font-heading mb-6 mt-3">
                                ₦ {{$product->price}}</h2>
                            <div class="flex -mx-2 flex-wrap mb-10">
                                <div class="w-full flex-1"><a
                                        class="block w-full px-3 py-4 rounded-sm text-center text-white text-sm font-medium bg-orange-500 hover:bg-orange-600 transition duration-200"
                                        href="#">Add to cart</a></div>
                            </div>
                            <div class="border border-slate-200 rounded-sm">
                                @if($product->specification)
                                    <div class="py-3 px-6 border-b border-slate-200" x-data="{ accordion: false }">
                                        <div class="flex items-center flex-wrap justify-between gap-4 cursor-pointer"
                                             x-on:click="accordion = !accordion">
                                            <p class="uppercase text-gray-500 font-bold text-xs tracking-widest">
                                                Specification</p>
                                            <span class="inline-block transform rotate-0"
                                                  :class="{'rotate-180': accordion, 'rotate-0': !accordion }">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewbox="0 0 24 25" fill="none">
                      <path
                          d="M12.2725 16.1666C12.1769 16.1667 12.0822 16.1479 11.9939 16.1113C11.9055 16.0747 11.8253 16.021 11.7578 15.9533L6.21332 10.4092C6.07681 10.2727 6.00012 10.0876 6.00012 9.89454C6.00012 9.70149 6.07681 9.51635 6.21332 9.37984C6.34983 9.24333 6.53497 9.16665 6.72802 9.16665C6.92107 9.16665 7.10621 9.24334 7.24271 9.37984L12.2725 14.4092L17.3023 9.37982C17.4388 9.24332 17.6239 9.16663 17.817 9.16663C18.01 9.16663 18.1952 9.24331 18.3317 9.37982C18.4682 9.51632 18.5449 9.70147 18.5449 9.89452C18.5449 10.0876 18.4682 10.2727 18.3317 10.4092L12.7872 15.9534C12.7197 16.0211 12.6394 16.0748 12.5511 16.1114C12.4628 16.148 12.3681 16.1667 12.2725 16.1666Z"
                          fill="#A0A5B8"></path>
                    </svg>
                  </span>
                                        </div>
                                        <div x-ref="container"
                                             :style="accordion ? 'height: ' + $refs.container.scrollHeight + 'px' : ''"
                                             class="overflow-hidden h-0 duration-500" style="">
                                            <p class="text-gray-500 leading-7 text-sm mt-3">{!!  $product->specification !!}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-products title="Other Products"/>
</x-layout-base>
