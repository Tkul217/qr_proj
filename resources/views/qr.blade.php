<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="py-12">
    @if(session('success'))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-green-500 border-b border-gray-200">
                    {{ session('success') }}
                </div>
            </div>
        </div>

    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

                <form action="{{route('store')}}" method="post">
                    @csrf
                    @method('POST')

                    <div class="lg:col-span-2">
                        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                <select name="name">
                                    <option>Выберите вариант из списка</option>
                                    @foreach($consumers as $consumer)
                                        <option value="{{$consumer->name}}">{{$consumer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="md:col-span-5">
                                <label for="room">Комната</label>
                                <input type="text" name="room" id="room" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{$room->name}}" readonly />
                            </div>

                            <div class="md:col-span-5 text-right">
                                <div class="inline-flex items-end">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Отправить</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>

            </div>
            @if($errors)
                @foreach ($errors->all() as $error)
                    <br>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong><br>
                        <span class="block sm:inline">{{$error}}</span>
                        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    </span>
                    </div>
                @endforeach
            @endif
        </div>
    @endif
</div>
</body>
</html>


