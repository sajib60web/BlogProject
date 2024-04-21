<?php

namespace App\Repositories\Post;

use App\Models\Post;
use App\Models\Upload;
use App\Traits\CommonTrait;
class PostRepository implements PostInterface {
    use CommonTrait;
    public function get(){
        return Post::orderbyDesc('id')->get();
    }
    public function getFind($id){
        return Post::find($id);
    }

    public function store($request){
        if($request->image):
            $image_id = $this->uploadFile('post',$request->image);
            $request['image_id']  = $image_id;
        endif;

        $request['slug'] = \Str::slug($request->title);

        $post = Post::create($request->except(['_token','image']));
        if($post):
            return true;
        else:
            return false;
        endif;
    }
    public function update($request){

        $post = Post::find($request->id);

        if($request->image):
            $image_id = $this->uploadFile('post',$request->image,$post->image_id);
            $request['image_id']  = $image_id;
        endif;
       $post->update($request->except(['_token','id','_method','image']));

        if($post):
            return true;
        else:
            return false;
        endif;
    }
    public function delete($id){
        $post  = Post::find($id);
        $upload = Upload::find($post->image_id);
        if($upload && file_exists($upload->original)):
            unlink($upload->original);
        endif;
        return Post::destroy($id);
    }
}
