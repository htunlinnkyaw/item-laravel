<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Person List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>



    <div class="container max-w-3xl mx-auto mt-10">
        <div>



            <a href="{{ route('person.create') }}"
                class=" border bg-zinc-800 rounded text-white border-black px-4 py-2 hover:bg-zinc-700 font-serif">Create
                Person</a>

            <table class="w-full mt-5 border text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone Number
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $person)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $person->name }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $person->phone->phone_number }}
                            </th>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



</body>

</html>
