<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Author') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">

                        <form action="{{ route('authorr.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="name"class="input input-bordered join-item" placeholder="nama author"/>
                            {{-- <input type="text" name="title"> --}}
                            {{-- <input type="number" name="year"> --}}
                            <input type="file" name="photo" class="file-input file-input-bordered w-full max-w-xs"/>
                            {{-- <input type="number" name="year"> --}}
                            
                            {{-- <select class="select select-bordered join-item" name="author_id" id="">
                                @foreach ($authors as $taski)
                                    <option value="{{ $taski->id }}">{{ $taski->name }}</option>
                                @endforeach
                            </select>

                            <select class="select select-bordered join-item" name="publisher_id" id="">
                                @foreach ($publishers as $taski)
                                    <option value="{{ $taski->id }}">{{ $taski->name }}</option>
                                @endforeach
                            </select> --}}
                            <button class="btn btn-active btn-primary"><input type="submit"></button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>