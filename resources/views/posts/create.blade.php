@php
  $header = 'Cadastrar Post';
@endphp

@extends('layouts.app')

@section('content')

  @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
      @foreach ( $errors->all() as $error )
        <span class="font-medium">Erro: </span> {{ $error }}
      @endforeach
    </div>    
  @endif

  @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
      <span class="font-medium">Sucesso: </span> Post cadastrado com sucesso.
    </div>
  @endif

  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('posts.store') }}" method="post">
    @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
        Título
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Título" name="title">
    </div>
    <div class="mb-6">
      <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Conteúdo</label>
      <textarea id="body" name="body" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Conteúdo do Post"></textarea>
    </div>
    <div class="flex items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
        Salvar
      </button>
    </div>
  </form>

@endsection
