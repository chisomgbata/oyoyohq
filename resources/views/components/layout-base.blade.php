@php use App\Models\Category; @endphp
@php $categories = Category::all(); @endphp
    <!DOCTYPE html>
<html lang="en">
<head>
    <title>Page title</title>
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
    {{--    <link rel="icon" type="image/png" sizes="32x32" href="shuffle-for-tailwind.png">--}}
</head>
<body class="antialiased bg-body text-body font-body" hx-boost="true">

<section class="relative overflow-hidden"
         x-data="{ slideWidth: 0, activeSlide: 0, slideCount: 3, mobileNavOpen: false }">
    <nav class="relative border-b border-slate-200 mb-4">
        <div class="h-20 py-4 px-6 bg-white border-b border-slate-200">
            <div class="container mx-auto px-4">
                <div class="relative flex h-full -mx-4 items-center justify-between">
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 hidden md:flex w-full max-w-xs items-center px-6 border border-slate-200 rounded-full">
                        <input
                            class="h-12 w-full bg-transparent border-0 text-sm text-slate-500 placeholder-slate-500 outline-none"
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
         x-cloak
         class="hidden fixed top-0 left-0 bottom-0 w-5/6 max-w-md z-50 ">
        <div x-on:click="mobileNavOpen = !mobileNavOpen" class="fixed inset-0 bg-purple-800 opacity-70"></div>
        <nav class="relative flex flex-col pt-12 pb-6 px-8 w-full h-full bg-white overflow-y-auto">
            <div class="flex mb-12 items-center"><a class="inline-block mr-auto" href="#"> <img class="h-8"
                                                                                                src="coleos-assets/logos/logo-coleos-2.svg"
                                                                                                alt=""> </a>
                <button x-on:click="mobileNavOpen = !mobileNavOpen">
                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6 18L18 6M6 6L18 18" stroke="#252E4A" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <div class="flex w-full max-w-xs items-center px-6 border border-slate-200 rounded-full"><input
                    class="h-12 w-full bg-transparent border-0 text-sm text-slate-500 placeholder-slate-500 outline-none"
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
            </div>
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

<section class="relative bg-white overflow-hidden">
    <div class="container mx-auto py-16 px-4">

        <div class="flex flex-wrap justify-center items-center gap-10 mb-8">
            @foreach(Category::take(6)->get() as $category)
                <a href="{{ route('categories', $category) }}">
                    <div class="flex items-center gap-1 group">
                        <span
                            class="text-gray-700 font-bold text-sm group-hover:text-gray-800 transition duration-200">{{$category->name}}</span>

                    </div>
                </a>
            @endforeach

        </div>
        <div class="flex gap-6 mb-6 justify-center flex-wrap">
            <a class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-500 hover:bg-orange-600 transition duration-200"
               href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13.6348 20.7273V12.766H16.3582L16.7668 9.66246H13.6348V7.68129C13.6348 6.78302 13.8881 6.17086 15.2029 6.17086L16.877 6.17018V3.39425C16.5875 3.35734 15.5937 3.27274 14.437 3.27274C12.0216 3.27274 10.368 4.71881 10.368 7.37392V9.66246H7.63635V12.766H10.368V20.7273H13.6348Z"
                          fill="white"></path>
                    <mask id="mask0_1301_2689" style="mask-type:luminance" maskunits="userSpaceOnUse" x="7" y="3"
                          width="10" height="18">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M13.6348 20.7273V12.766H16.3582L16.7668 9.66246H13.6348V7.68129C13.6348 6.78302 13.8881 6.17086 15.2029 6.17086L16.877 6.17018V3.39425C16.5875 3.35734 15.5937 3.27274 14.437 3.27274C12.0216 3.27274 10.368 4.71881 10.368 7.37392V9.66246H7.63635V12.766H10.368V20.7273H13.6348Z"
                              fill="white"></path>
                    </mask>
                    <g mask="url(#mask0_1301_2689)"></g>
                </svg>
            </a>
            <a class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-500 hover:bg-orange-600 transition duration-200"
               href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.8182 6.14598C21.1356 6.44844 20.4032 6.65356 19.6337 6.74513C20.4194 6.27462 21.0209 5.52831 21.3059 4.64177C20.5689 5.0775 19.7553 5.39389 18.8885 5.56541C18.1943 4.82489 17.207 4.36365 16.1118 4.36365C14.0108 4.36365 12.3073 6.06719 12.3073 8.16707C12.3073 8.46489 12.3409 8.75577 12.4058 9.03392C9.24437 8.87513 6.44107 7.3605 4.56486 5.05895C4.23689 5.61986 4.05031 6.27344 4.05031 6.9711C4.05031 8.29107 4.72246 9.45574 5.74228 10.1371C5.1188 10.1163 4.5324 9.94477 4.01904 9.65968V9.70719C4.01904 11.5498 5.33089 13.0876 7.07034 13.4376C6.75164 13.5234 6.41558 13.5709 6.06792 13.5709C5.82225 13.5709 5.58468 13.5466 5.35174 13.5002C5.83613 15.0125 7.24071 16.1123 8.90486 16.1424C7.60343 17.1623 5.96246 17.7683 4.18013 17.7683C3.87304 17.7683 3.57055 17.7498 3.27274 17.7162C4.95658 18.7974 6.95564 19.4279 9.10419 19.4279C16.1026 19.4279 19.9281 13.6312 19.9281 8.60398L19.9153 8.11147C20.6628 7.57834 21.3094 6.90853 21.8182 6.14598Z"
                          fill="white"></path>
                    <mask id="mask0_1301_2692" style="mask-type:luminance" maskunits="userSpaceOnUse" x="3" y="4"
                          width="19" height="16">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.8182 6.14598C21.1356 6.44844 20.4032 6.65356 19.6337 6.74513C20.4194 6.27462 21.0209 5.52831 21.3059 4.64177C20.5689 5.0775 19.7553 5.39389 18.8885 5.56541C18.1943 4.82489 17.207 4.36365 16.1118 4.36365C14.0108 4.36365 12.3073 6.06719 12.3073 8.16707C12.3073 8.46489 12.3409 8.75577 12.4058 9.03392C9.24437 8.87513 6.44107 7.3605 4.56486 5.05895C4.23689 5.61986 4.05031 6.27344 4.05031 6.9711C4.05031 8.29107 4.72246 9.45574 5.74228 10.1371C5.1188 10.1163 4.5324 9.94477 4.01904 9.65968V9.70719C4.01904 11.5498 5.33089 13.0876 7.07034 13.4376C6.75164 13.5234 6.41558 13.5709 6.06792 13.5709C5.82225 13.5709 5.58468 13.5466 5.35174 13.5002C5.83613 15.0125 7.24071 16.1123 8.90486 16.1424C7.60343 17.1623 5.96246 17.7683 4.18013 17.7683C3.87304 17.7683 3.57055 17.7498 3.27274 17.7162C4.95658 18.7974 6.95564 19.4279 9.10419 19.4279C16.1026 19.4279 19.9281 13.6312 19.9281 8.60398L19.9153 8.11147C20.6628 7.57834 21.3094 6.90853 21.8182 6.14598Z"
                              fill="white"></path>
                    </mask>
                    <g mask="url(#mask0_1301_2692)"></g>
                </svg>
            </a>
            <a class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-500 hover:bg-orange-600 transition duration-200"
               href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M7.60063 2.18182H16.3991C19.3873 2.18182 21.8183 4.61282 21.8182 7.60075V16.3993C21.8182 19.3872 19.3873 21.8182 16.3991 21.8182H7.60063C4.6127 21.8182 2.18182 19.3873 2.18182 16.3993V7.60075C2.18182 4.61282 4.6127 2.18182 7.60063 2.18182ZM16.3993 20.076C18.4266 20.076 20.0761 18.4266 20.0761 16.3993H20.076V7.60075C20.076 5.57349 18.4265 3.92406 16.3991 3.92406H7.60063C5.57337 3.92406 3.92406 5.57349 3.92406 7.60075V16.3993C3.92406 18.4266 5.57337 20.0761 7.60063 20.076H16.3993ZM6.85715 12.0001C6.85715 9.16424 9.16419 6.85715 12 6.85715C14.8358 6.85715 17.1429 9.16424 17.1429 12.0001C17.1429 14.8359 14.8358 17.1429 12 17.1429C9.16419 17.1429 6.85715 14.8359 6.85715 12.0001ZM8.62799 12C8.62799 13.8593 10.1407 15.3719 12 15.3719C13.8593 15.3719 15.372 13.8593 15.372 12C15.372 10.1406 13.8594 8.62791 12 8.62791C10.1406 8.62791 8.62799 10.1406 8.62799 12Z"
                          fill="white"></path>
                    <mask id="mask0_1301_2695" style="mask-type:luminance" maskunits="userSpaceOnUse" x="2" y="2"
                          width="20" height="20">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.60063 2.18182H16.3991C19.3873 2.18182 21.8183 4.61282 21.8182 7.60075V16.3993C21.8182 19.3872 19.3873 21.8182 16.3991 21.8182H7.60063C4.6127 21.8182 2.18182 19.3873 2.18182 16.3993V7.60075C2.18182 4.61282 4.6127 2.18182 7.60063 2.18182ZM16.3993 20.076C18.4266 20.076 20.0761 18.4266 20.0761 16.3993H20.076V7.60075C20.076 5.57349 18.4265 3.92406 16.3991 3.92406H7.60063C5.57337 3.92406 3.92406 5.57349 3.92406 7.60075V16.3993C3.92406 18.4266 5.57337 20.0761 7.60063 20.076H16.3993ZM6.85715 12.0001C6.85715 9.16424 9.16419 6.85715 12 6.85715C14.8358 6.85715 17.1429 9.16424 17.1429 12.0001C17.1429 14.8359 14.8358 17.1429 12 17.1429C9.16419 17.1429 6.85715 14.8359 6.85715 12.0001ZM8.62799 12C8.62799 13.8593 10.1407 15.3719 12 15.3719C13.8593 15.3719 15.372 13.8593 15.372 12C15.372 10.1406 13.8594 8.62791 12 8.62791C10.1406 8.62791 8.62799 10.1406 8.62799 12Z"
                              fill="white"></path>
                    </mask>
                    <g mask="url(#mask0_1301_2695)"></g>
                </svg>
            </a>
            <a class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-500 hover:bg-orange-600 transition duration-200"
               href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewbox="0 0 18 18" fill="none">
                    <path
                        d="M16.2 0H1.8C0.81 0 0 0.81 0 1.8V16.2C0 17.19 0.81 18 1.8 18H16.2C17.19 18 18 17.19 18 16.2V1.8C18 0.81 17.19 0 16.2 0ZM5.4 15.3H2.7V7.2H5.4V15.3ZM4.05 5.67C3.15 5.67 2.43 4.95 2.43 4.05C2.43 3.15 3.15 2.43 4.05 2.43C4.95 2.43 5.67 3.15 5.67 4.05C5.67 4.95 4.95 5.67 4.05 5.67ZM15.3 15.3H12.6V10.53C12.6 9.81004 11.97 9.18 11.25 9.18C10.53 9.18 9.9 9.81004 9.9 10.53V15.3H7.2V7.2H9.9V8.28C10.35 7.56 11.34 7.02 12.15 7.02C13.86 7.02 15.3 8.46 15.3 10.17V15.3Z"
                        fill="white"></path>
                </svg>
            </a>
        </div>
        <p class="text-center text-sm text-gray-400">© Copyright 2025. All Rights reserved by OyoyoHQ.</p>
    </div>
</section>

</body>
</html>

