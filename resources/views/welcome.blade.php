@php use App\Models\Category;use App\Models\Setting; @endphp
@php $categories = Category::all(); @endphp
@php
    $settings = Setting::where('key', 'home_page_slides')
        ->first();
@endphp
@props(['title'])
    <!doctype html>
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
    <style>
        .splide__pagination__page.is-active {
            height: 4px;
            border-radius: 0;
            opacity: 1;
            content: '' !important;
        }

        .fade-in-top {
            animation: fade-in-top 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
            animation-delay: 0.3s;
        }

        .fade-in {
            animation: fade-in 0.6s cubic-bezier(0.390, 0.575, 0.565, 1.000) both;
            animation-delay: 0.6s;
        }


        @keyframes fade-in {
            0% {
                opacity: 0;
                scale: 0.95;
            }
            100% {
                opacity: 1;
                scale: 1;
            }
        }

        @keyframes fade-in-top {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }


    </style>
    
</head>
<body>
<section class="splide relative">
    <x-header/>
    <div class="splide__track">
        <ul class="splide__list">

            @foreach($settings->values as $slide)
                <li class="splide__slide  h-screen relative flex flex-col justify-center pb-20 px-20 lg:px-40 gap-4 rounded-b-2xl "
                    style="color: {{$slide['color']}}"
                >
                    <h1 class=" font-bold text-6xl font-sans mb-10 text-inherit" x-data="{shown:false}"
                        x-intersect:enter="shown = true"
                        x-intersect:leave="shown = false"
                        x-bind:class="{'fade-in-top': shown}"
                    >
                        {{$slide['title']}}
                    </h1>
                    <p class="mb-10 font-semibold text-2xl font-mono fade-in text-inherit"
                       x-data="{shown:false}"
                       x-intersect:enter="shown = true"
                       x-intersect:leave="shown = false"
                       x-bind:class="{'fade-in': shown}"
                    >
                        {{$slide['description']}}
                    </p>

                    <div class="w-full h-full bg-black/10 inset-0 absolute"></div>

                    <img
                        class="w-full h-full object-cover absolute inset-0 -z-10"
                        src="
                        {{ $slide['image'] ? asset('storage/' . $slide['image']) : 'https://via.placeholder.com/1920x1080' }}
                        "
                        alt="test image "/>
                </li>
            @endforeach

        </ul>


    </div>


</section>

<section class="container mx-auto p-8">
    <h1 class="my-10 text-5xl font-mono font-bold">Categories</h1>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 ">
        @foreach($categories as $category)
            <div class="h-auto w-full rounded-2xl aspect-square relative overflow-clip group" x-data="{shown:false}"
                 x-intersect:enter="shown = true"
                 x-intersect:leave="shown = false"
                 x-bind:class="{'fade-in-top': shown}">
                <img src="{{asset('storage/' . $category->image)}}" alt="{{$category->name}}"
                     class="w-full h-full absolute duration-500 transition-all -z-20
                        group-hover:scale-110 object-cover"
                />
                <div class="absolute inset-0 w-full h-full bg-black/30 -z-10"></div>

                <a class="absolute inset-0 w-full h-full z-10" href="{{route('categories', $category)}}"></a>

                <div class=" text-white p-10">
                    <h1 class="font-mono text:2xl lg:text-5xl font-black"> {{$category->name}}</h1>
                    <p class="text-lg lg:text-2xl font-bold mt-4">
                        {{$category->subtitle}}
                    </p>
                </div>

            </div>
        @endforeach


    </div>
</section>


<x-footer/>

</body>
</html>
