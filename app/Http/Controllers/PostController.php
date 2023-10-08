<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePostFormRequest;
use App\Models\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post->get();
        
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdatePostFormRequest $request)
    {
        $post = $request->user()->posts()->create($request->all());

        return redirect()->back()->withSuccess('Cadastro realizado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = $this->post->find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdatePostFormRequest $request, string $id)
    {
        $post = $this->post->find($id);

        $post->update($request->all());

        return redirect()->back()->withSuccess('Cadastro atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
