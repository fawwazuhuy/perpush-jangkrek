<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">

                        <div class="card mb-2 mt-2 bg-base-100">
                            <figure><img src="{{ asset('storage/'.$books->cover) }}" alt="bebek di bakar" /></figure>
                            <div class="card-body">
                                <h1>{{ $books->title }}</h1>
                                <h2>author: {{ $books->author->name }}</h2>
                                <p>publisher: {{ $books->publisher->name }}</p>
                                <p>tahun release: {{ $books->year }}</p>
            
                                <div class="card-actions">
                                    <a href="{{ route('book.edit', $books) }}"   class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('book.destroy', $books) }}" style="text-decoration:none;" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input class="btn btn-error btn-sm"  type="submit" value="Delete">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <div class="avatar">
    <div class="mask mask-squircle w-12 h-12">
      <img src="{{ asset('storage/'.$book->cover) }}" alt="bebek di bakar" />
    </div>
  </div> --}}