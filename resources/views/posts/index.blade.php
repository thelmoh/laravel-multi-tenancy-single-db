@extends('layouts.app')

@section('content')
    @foreach ($posts as $post)
        <div class="block p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$post->title}}</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">{{$post->body}}</p>
            <div class="text-sm text-gray-500 dark:text-gray-400">{{$post->user->name}}</div>
            <p><a href="{{ route('posts.edit', $post->id)}}">Editar</a></p>
        </div>
    @endforeach
@endsection