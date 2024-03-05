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
                        <a href="{{ route('dashboard') }}"><button class="btn btn-active btn-error">kembali</button></a>
                        <a href="{{ route('authorr.create') }}"><button class="btn btn-active btn-primary">+ Tambah author</button></a>
                        @foreach ($authors as $bebek)
                        <div class="card mb-2 mt-2 bg-base-100">
                            <figure>
                                {{-- {{ $bebek->photo }} --}}
                                <img src="{{ asset('storage/'.$bebek->photo) }}" alt="bebek di bakar" />
                                {{-- <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes" /> --}}
                            </figure>
                            <div class="card-body">                         
                                <h1>{{ $bebek->name }}</h1> 

                                <div class="card-actions">
                                    <a href="{{ route('authorr.edit', $bebek) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('authorr.destroy', $bebek) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-error btn-sm" type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>