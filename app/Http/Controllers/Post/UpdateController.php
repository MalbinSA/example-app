<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(FilterRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);
        return $post instanceof Post ? new PostResource($post) : $post;

//        return redirect()->route('post.show', compact('post'));
    }
}
