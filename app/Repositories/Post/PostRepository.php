<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Image;
class PostRepository implements PostInterface {
    public function get(){
        return Post::orderbyDesc('id')->get();
    }
    public function getFind($id){
        return Post::find($id);
    }
    public function store($request){
        // if($request->image_id):
        //     $image = Image::make('public/'.$request->get('image_id')->getRealPath())->resize(300, 200);

        //     $img = Image::make($request->get('image_id'));
        //     $extension = $this->get_mime($img->mime());

        //     $str_random = Str::random(8);
        //     $imgpath = $str_random.time().$extension;
        //     $img->save(storage_path('app/imagesfp').'/'.$imgpath);


        // endif;

        $post = Post::create($request->except(['_token']));
        if($post):
            return true;
        else:
            return false;
        endif;
    }
    public function update($request){
        $post = Post::where('id',$request->id)->update($request->except(['_token','id','_method']));
        if($post):
            return true;
        else:
            return false;
        endif;
    }
    public function delete($id){
        return Post::destroy($id);
    }
}
