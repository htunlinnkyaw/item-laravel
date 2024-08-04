<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    {{-- {{ $item }} --}}
    <div class="flex flex-col h-screen items-center justify-center">


        <div
            class="w-[600px] h-[400px] p-6 bg-white border-2  border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl font-bold mb-2">Item Detail</h1>
            <ul class="my-3  border  text-black p-5">
                <li class="bg-gray-300 mb-3 px-3 py-1 text-black rounded"><span
                        class="font-bold text-gray-600">Name</span> -
                    {{ $item->name }}</li>
                <li class="bg-gray-300 mb-3 px-3 py-1 text-black rounded"><span
                        class="font-bold text-gray-600">Price</span> - $
                    {{ $item->price }}</li>
                <li class="bg-gray-300 mb-3 px-3 py-1 text-black rounded"><span
                        class="font-bold text-gray-600">Stock</span> -
                    {{ $item->stock }}</li>
                <li class="bg-gray-300 mb-3 px-3 py-1 text-black rounded"><span
                        class="font-bold text-gray-600">Status</span> - <span
                        class="capitalize">{{ $item->status }}</span></li>
                <li class="bg-gray-300 mb-3 px-3 py-1 text-black rounded"><span
                        class="font-bold text-gray-600">Category</span> -
                    {{ $item->category->name }}</li>
            </ul>
            <a href="{{ route('item.index') }}"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Back to List
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>

    </div>
</body>

</html>
