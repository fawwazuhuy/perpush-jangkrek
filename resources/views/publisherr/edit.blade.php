<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('publisher') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <form action="{{ route('publisherr.update', $publishers->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input value="{{ $publishers->name }}" name="name"class="input input-bordered join-item" placeholder="title"/>
                            <input value="{{ $publishers->address }}" name="address"class="input input-bordered join-item" placeholder="address"/>
                            {{-- <input type="text" name="title"> --}}
                            {{-- <input type="file" value="{{ $publishers->photo }}" name="photo" class="file-input file-input-bordered w-full max-w-xs"/> --}}
                            <button class="btn btn-active btn-primary"><input type="submit"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>