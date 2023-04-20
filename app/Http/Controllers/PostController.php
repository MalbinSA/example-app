<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Post\BaseController;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(FilterRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post/show', compact('post'));
    }

    public function edit(Post $post)
    {

        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' =>'',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post = $post->fresh();
        $post->tags()->sync($tags);

        return redirect()->route('post.show', compact('post'));

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    // firstOrCreate
    // updateOrCreate

    public function firstOrCreate()
    {

        $anotherPost = [
            'title' => 'first or Created',
            'content' => 'have some content',
            'image' => '',
            'likes' => 2,
            'is_published' => 0,
        ];

        $post = Post::firstOrCreate([
            'title' => 'first or Created'
        ], [
            'title' => 'first or Created',
            'content' => 'have some content',
            'image' => '',
            'likes' => 2,
            'is_published' => 0,
        ]);

        dump($post->content);
        dd('finished');
    }

    public function updateOrCreate()
    {
        $anotherPost = [
            'title' => 'first or Update',
            'content' => 'have some update content',
            'image' => '',
            'likes' => 2,
            'is_published' => 0,
        ];

        $upDate = Post::updateOrCreate([
            'title' => 'first or Created'
        ], [
            'title' => 'first or Update',
            'content' => 'have some update content',
            'image' => '',
            'likes' => 2,
            'is_published' => 0,
        ]);
        dd('$upDate');
    }
}
