<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Person Create</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>



    <div class="w-full h-screen flex justify-center items-center">



        <div
            class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-xl font-bold font-serif">Create Phone Number </h1>
            <form class="space-y-6" action="{{ route('phone.store') }}" method="post">
                @csrf
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone
                        Number</label>
                    <input type="number" name="phone_number" id="phone_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        placeholder="Phone No..." required />
                </div>

                <div>


                    <label for="person" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        a Person
                    </label>
                    <select id="person" name="person_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach ($persons as $person)
                            <option value="{{ $person->id }}">{{ $person->name }}
                            </option>
                        @endforeach
                    </select>


                </div>



                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create
                </button>
            </form>
        </div>


    </div>
</body>

</html>
