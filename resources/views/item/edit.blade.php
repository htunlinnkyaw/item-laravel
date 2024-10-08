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
            <form class="space-y-4" action={{ route('item.update', $item->id) }} method="post"
                enctype="multipart/form-data">

                @method('put')
                @csrf
                <div>
                    <label for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name"
                        class="bg-gray-50 @error('name')
                            border-red-600
                        @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        value="{{ old('name', $item->name) }}" />

                    @error('name')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="price"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="number" name="price" id="price" placeholder=""
                        class="bg-gray-50 @error('price')
                            border-red-600
                        @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        value={{ old('price', $item->price) }} />
                    @error('price')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stock"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="bg-gray-50 @error('stock')
                            border-red-600
                        @enderror border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="0" value={{ old('stock', $item->stock) }} />
                    @error('stock')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="image"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    @foreach ($item->item_images as $image)
                        <img src="{{ asset('storage/item_images/' . $image) }}" width="80" alt="">
                    @endforeach
                    <input type="file" value="" name="images[]" id="image" value="{{ old('image') }}"
                        multiple
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="0" />

                </div>
                <div>

                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Item
                        Description
                    </label>
                    <textarea name="description" id="description" rows="4"
                        class="block @error('description')
                            border-red-600
                        @enderror p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Something...">{{ old('description', $item->description) }}</textarea>
                    @error('description')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>


                    <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        an
                        Category</label>
                    <select id="categories" name="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $item->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>


                    @error('category_id')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3 items-center">
                    <div>
                        <input id="default-radio-1" type="radio" value="available"
                            {{ $item->status == 'available' ? 'checked' : '' }} name="status"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-1"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Available</label>
                    </div>
                    <div>
                        <input id="default-radio-2" type="radio" value="unavailable"
                            {{ $item->status == 'unavailable' ? 'checked' : '' }} name="status"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-radio-2"
                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Unavailable</label>
                    </div>

                </div>

                <div class="">
                    <a href="{{ route('item.index') }}"
                        class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Back
                        To List</a>
                    <button type="submit"
                        class="inline-block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update Item
                    </button>
                </div>

            </form>
        </div>


    </div>




</body>

</html>
