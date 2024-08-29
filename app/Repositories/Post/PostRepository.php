<?php

namespace App\Repositories\Post;

use App\Enums\UserType;
use App\Models\Post;
use App\Models\Upload;
use App\Traits\CommonTrait;
use Illuminate\Support\Str;

class PostRepository implements PostInterface
{
    use CommonTrait;

    public function get()
    {
        return Post::orderbyDesc('id')->get();
    }

    public function getFind($id)
    {
        return Post::find($id);
    }

    public function store($request)
    {
        if ($request->image) :
            $image_id = $this->uploadFile('post', $request->image);
            $request['image_id']  = $image_id;
        endif;

        $request['slug'] = Str::slug($request->title);
        $request['canonical_url'] = Str::slug($request->title);
        $post = Post::create($request->except(['_token', 'image', 'files']));
        $post->canonical_url = url('post/' . $post->id . '/' . $post->slug);
        $post->save();
        if ($post) :
            return true;
        else :
            return false;
        endif;
    }

    public function update($request)
    {
        $post = Post::find($request->id);
        if ($request->image) :
            $image_id = $this->uploadFile('post', $request->image, $post->image_id);
            $request['image_id']  = $image_id;
        endif;
        if (auth()->user()->user_type == UserType::USER) {
            $post->update_count = $post->update_count + 1;
        }
        $request['slug'] = Str::slug($request->title);
        $post->update($request->except(['_token', 'id', '_method', 'image', 'files']));
        $post->canonical_url = url('post/' . $post->id . '/' . $post->slug);
        $post->save();
        if ($post) :
            return true;
        else :
            return false;
        endif;
    }

    public function delete($id)
    {
        $post  = Post::find($id);
        $upload = Upload::find($post->image_id);
        if ($upload && file_exists($upload->original)) :
            unlink($upload->original);
        endif;
        return Post::destroy($id);
    }
}
