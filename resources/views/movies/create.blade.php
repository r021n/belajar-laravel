@extends('app')

@section('content')
    <!-- @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="text-red-500">{{$error}}</li>
            @endforeach
        </ul>
    @endif -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-6">Add Movie</h2>

        <form action="{{route('movie.store')}}" class="space-y-6" method="POST">
            @csrf
            <div>
                <label for="title" class="block text-lg mb-2">Title</label>
                <input value="{{old('title')}}" type="text" name="title" id="title" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('title')
                    border-red-500
                @enderror">
                @error('title')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="description" class="block text-lg mb-2">Description</label>
                <textarea name="description" id="description" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('description')
                    border-red-500
                @enderror">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="release_date" class="block text-lg mb-2">Release Date</label>
                <input value="{{old('release_date')}}" type="date" name="release_date" id="" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600 @error('release_date')
                    border-red-500
                @enderror">
                @error('release_date')
                    <p class="text-red-500">{{$message}}</p>
                @enderror
            </div>
            <div>
                <label for="cast" class="block text-lg mb-2">Cast</label>
                <input value="{{old('cast')}}" type="text" name="cast" id="cast" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <label for="genres" class="block text-lg mb-2">Genres</label>
                <input value="{{old('genres')}}" type="text" name="genres" id="genres" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <label for="image" class="block text-lg mb-2">Poster</label>
                <input value="{{old('image')}}" type="text" name="image" id="image" class="w-full p-2 bg-gray-800 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>
            <div>
                <button type="submit" class="bg-blue-600 px-6 py-2 rounded hover:bg-blue-500">Save</button>
            </div>
        </form>
    </div>
@endsection
