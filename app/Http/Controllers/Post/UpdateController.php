<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class UpdateController extends BaseController
{
    public function __invoke(FilterRequest $request, Post $post)
    {
        $data = $request->validated();
        $this->service->update($post, $data);

        return redirect()->route('post.show', compact('post'));
    }
}
