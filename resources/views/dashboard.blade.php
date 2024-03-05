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

                      <form class="form" method="get" action="{{ route('search') }}">
                        <div class="flex items-center gap-2 justify-center">
                            <input type="text" name="bebek" id="bebek" class="input input-bordered w-96" placeholder="Masukkan keyword">
                            <button type="submit" class="btn btn-primary">Cari</button>
                            <button class="btn btn-active btn-primary"> <a href="{{ route('create') }}">tambah data +</a> </button>
                        </div>
                      </form>
                      

                        <table class="table">
                          <!-- head -->
                          <thead>
                            <tr>
                              <th>Title</th>
                              <th>image</th>
                              <th>author name <a href="{{ route('authorr.index') }}">+</a></th>
                              <th>publisher <a href="{{ route('publisherr.index') }}">+</th>
                              <th>year</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- row 1 -->
                           
                            
                            {{-- @if (count($results) > 0)
                              <ul>
                                @foreach ($results as $result)
                                  <li>{{ $result->name }}</li>
                                @endforeach
                              </ul>
                            @else
                                  <p>No results found.</p>
                            @endif --}}

                            @foreach ($books as $book)
                            <tr>       
                                <th>{{ $book->title }}</th>
                                <th>
                                    <div class="flex items-center gap-3">
                                      <div class="avatar">
                                        <div class="mask mask-squircle w-12 h-12">
                                          <img src="{{ asset('storage/'.$book->cover) }}" alt="bebek di bakar" />
                                        </div>
                                      </div>                                     
                                    </div>
                                  </th>
                                <th>{{ $book->author->name }}</th>
                                <th>{{ $book->publisher->name }}</th>
                                <th>{{ $book->year }}</th>
                                <th>
                                    <a href="{{ route('book.show', $book->id) }}">Show</a>
                                    <a href="{{ route('book.edit', $book->id) }}">Edit</a>
                                    <form action="{{ route('book.destroy', $book) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-indigo-600 hover:text-indigo-900"
                                          onclick="return confirm('Are you sure delete this data?')">Delete</button>
                                        </form>
                                </th>                               
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        {{-- <button class="btn btn-active btn-primary"> <a href="{{ route('create') }}">tambah</a> </button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

{{-- <div>
                                        <div class="font-bold">Hart Hagerty</div>
                                        <div class="text-sm opacity-50">United States</div>
                                      </div> --}}

{{-- <th><a href="{{ route('task.edit', $book) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                                <form action="{{ route('task.destroy', $book) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-indigo-600 hover:text-indigo-900" onclick="return confirm('Are you sure delete thisdata?')">Delete</button>
                                </form>
                                </th> --}}
