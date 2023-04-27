<?php

namespace App\Http\Controllers\Post;

use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\Post\PostResource;

class StoreController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
//        $this->service->store($data);
        $post = $this->service->store($data);

        return new PostResource($post);
//        return redirect()->route('post.index');
    }
}
