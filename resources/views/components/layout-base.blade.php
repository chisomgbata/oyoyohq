@php use App\Models\Category; @endphp
@php $categories = Category::all(); @endphp
@props(['title'])
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>
        @if($title ?? false)
            {{$title}} | OyoyoHQ
        @else
            OyoyoHQ
        @endif
    </title>
    <meta name="description"
          content="OyoyoHQ is a leading e-commerce platform that offers a wide range of products at competitive prices. Shop now and enjoy fast delivery and excellent customer service.">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>
<body class="antialiased bg-body text-body font-body">

<section class="relative overflow-hidden" x-data="{  mobileNavOpen: false }" x-cloak>
    <nav class="relative border-b border-slate-200 mb-4">
        <div class="h-20 py-4 px-6 bg-white border-b border-slate-200">
            <div class="container mx-auto px-4">
                <div class="relative flex h-full -mx-4 items-center justify-between">
                    <div
                        class="">
                        <form
                            hx-boost="true"
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden md:flex w-full max-w-xs items-center px-6 border border-slate-200 rounded-full"
                            action="{{ route('search') }}" method="get">
                            <input
                                class="h-12 w-full bg-transparent border-0 text-sm text-slate-500 placeholder-slate-500 outline-none"
                                name="q"
                                value="{{request()->input('q')}}"
                                x-data="{}"
                                @input.debounce.500ms="$el.closest('form').submit()"
                                type="search" placeholder="Search...">
                            <button class="inline-block ml-auto text-slate-400 hover:text-slate-500" type="submit">
                                <svg width="14" height="14" viewbox="0 0 14 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M6.33333 11.6667C9.27885 11.6667 11.6667 9.27885 11.6667 6.33333C11.6667 3.38782 9.27885 1 6.33333 1C3.38782 1 1 3.38782 1 6.33333C1 9.27885 3.38782 11.6667 6.33333 11.6667Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M13.0001 13L10.1001 10.1" stroke="currentColor" stroke-width="1.5"
                                          stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="w-1/2 px-4">
                        <div class="flex items-center"><a class="inline-block h-9 mr-6 flex-shrink-0"
                                                          href="{{ route('home') }}"><h1
                                    class="font-bold font-mono text-2xl">Oyoyo<span
                                        class="text-orange-600">HQ</span></h1></a></div>
                    </div>
                    <div class="w-1/2 px-4">
                        <div class="flex items-center justify-end"><a
                                class="group inline-flex mr-6 items-center text-sm text-slate-400 hover:text-purple-200"
                                href="{{ route('checkout') }}"> <span
                                    class="md:mr-2 text-slate-400 group-hover:text-slate-600">
                                    <x-heroicon-o-shopping-cart
                                        class="w-6 h-6"/>                </span>
                                <span class="hidden xl:inline-block text-slate-700">My Cart</span> </a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-full items-center justify-end lg:justify-center h-14 py-3 px-6 bg-white">
            <div class="container mx-auto px-4">
                <div class="flex items-center justify-between">
                    <div class="hidden lg:flex items-center">
                        @foreach($categories as $category)
                            <a
                                class="inline-flex mr-10 items-center text-sm font-bold text-slate-700 hover:text-slate-400"
                                href="{{ route('categories', $category) }}"> <span
                                    class="mr-2">{{$category->name}}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
                <button x-on:click="mobileNavOpen = !mobileNavOpen"
                        class="lg:hidden text-slate-400 hover:text-slate-600">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 12H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M3 6H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                        <path d="M3 18H21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div x-show="mobileNavOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-x-full"
         x-transition:enter-end="opacity-100 transform translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 transform translate-x-0"
         x-transition:leave-end="opacity-0 transform -translate-x-full"
         class=" fixed top-0 left-0 bottom-0 w-5/6 max-w-md z-50 ">

        <div x-on:click="mobileNavOpen = !mobileNavOpen" class="fixed inset-0 bg-purple-800 opacity-20"
             x-show="mobileNavOpen"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-70"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-70"
             x-transition:leave-end="opacity-0"
        ></div>
        <nav class="relative flex flex-col pt-12 pb-6 px-8 w-full h-full bg-white overflow-y-auto">
            <div class="flex mb-12 items-center">
                <button x-on:click="mobileNavOpen = !mobileNavOpen">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="#252E4A" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <form action="{{ route('search') }}" method="get"
                  class="flex w-full max-w-xs items-center px-6 border border-slate-200 rounded-full"><input
                    class="h-12 w-full bg-transparent border-0 text-sm text-slate-500 placeholder-slate-500 outline-none"
                    name="q"
                    type="search" placeholder="Search...">
                <button class="inline-block ml-auto text-slate-400 hover:text-slate-500" type="submit">
                    <svg width="14" height="14" viewbox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6.33333 11.6667C9.27885 11.6667 11.6667 9.27885 11.6667 6.33333C11.6667 3.38782 9.27885 1 6.33333 1C3.38782 1 1 3.38782 1 6.33333C1 9.27885 3.38782 11.6667 6.33333 11.6667Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M13.0001 13L10.1001 10.1" stroke="currentColor" stroke-width="1.5"
                              stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </button>
            </form>
            <div class="py-12 mb-auto">
                <ul class="flex-col">

                    @foreach($categories as $category)
                        <li class="mb-4"><a class="flex items-center text-base font-bold text-slate-700"
                                            href="#">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div><p class="text-center text-sm text-slate-400">OYOYOHQ 2025</p></div>
        </nav>
    </div>

</section>

{{$slot}}


<x-footer/>
</body>
</html>

