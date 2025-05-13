<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobble Storefront</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gray-100 text-gray-800" hx-headers='{"X-CSRF-TOKEN": "{{ csrf_token() }}"}' hx-boost="true">

<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <a href="{{route('home')}}"
                   class="flex items-center space-x-2 text-indigo-700 hover:text-indigo-800 transition-colors">
                    <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                    </svg>
                    <span class="text-2xl font-bold">Dobble</span>
                </a>
            </div>

            <div class="flex items-center">
                <a href="{{ route('checkout') }}" aria-label="Open cart"

                   class="p-2 rounded-full text-gray-600 hover:text-indigo-700 hover:bg-indigo-100 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    <svg class="h-7 w-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/>
                    </svg>
                    <span class="sr-only">Cart</span>
                </a>
            </div>
        </div>
    </div>
</header>

<main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{$slot}}

</main>

<footer class="bg-gray-800 text-gray-300 mt-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center">
        <p>&copy; <span id="currentYear"></span> Dobble. All rights reserved.</p>
    </div>
</footer>


<script>
    // Set current year in footer
    document.getElementById('currentYear').textContent = new Date().getFullYear();
</script>

</body>
</html>
