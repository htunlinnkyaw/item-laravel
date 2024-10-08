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



    <div class="w-full h-screen flex justify-center items-center">



        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-xl font-bold">Category Create Form</h1>
            {{-- {{ $fruit }} --}}
            <form class="space-y-6" action="{{ route('category.store') }}" method="post">
                @csrf
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="bg-gray-50 border @error('name')
                            border-red-600
                        @enderror border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white "
                        placeholder="Name.." />
                    @error('name')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>

                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="block @error('description')
                            border-red-600
                        @enderror p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your Category...">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror

                </div>


                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create New Category
                </button>
            </form>
        </div>


    </div>
</body>

</html>
