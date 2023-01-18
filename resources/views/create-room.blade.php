<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Создание комнаты') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if(session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-6">
                <div class="bg-green-500 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-green-500 border-b border-gray-200">
                        {{ session('success') }}
                    </div>
                </div>
            </div>

        @endif
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">

                    <form action="{{route('dashboard.store-room')}}" method="post">
                        @csrf
                        @method('POST')

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">

                                <div class="md:col-span-5">
                                    <label for="name">Название комнаты</label>
                                    <input type="text" name="name" id="name" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"/>
                                </div>

                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Создать</button>
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
                <h5>Список всех комнат:</h5>
                <select>
                    <option></option>
                    @foreach($rooms as $room)
                        <option>{{$room->id . '. ' . $room->name}}</option>
                    @endforeach
                </select>
            </div>
    </div>
</x-app-layout>

