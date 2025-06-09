@php use App\Models\Category;use App\Models\Setting; @endphp
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
            @foreach(Setting::where('key', 'social_links')->first()->values as $social)
                <a class="w-12 h-12 rounded-full flex items-center justify-center bg-orange-500 hover:bg-orange-600 transition duration-200"
                   href="{{ $social['url'] }}" target="_blank" rel="noopener noreferrer">
                    <x-icon name="{{ $social['icon'] }}" class="w-6 h-6 text-white"/>
                </a>

            @endforeach
        </div>
        <p class="text-center text-sm text-gray-400">© Copyright 2025. All Rights reserved by OyoyoHQ.</p>
    </div>
</section>
