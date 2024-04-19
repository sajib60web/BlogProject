<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Enums\Status;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Post\PostInterface;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    protected $repo;
    public function __construct(PostInterface $repo)
    {
        $this->repo = $repo;
    }

    public function postList()
    {
        $data['page_name'] = 'Post List';
        $data['posts'] = Post::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(10);
        return view('auth.posts.post_list', $data);
    }

    public function postCreate()
    {
        $data['page_name'] = 'Post Create';
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('auth.posts.post_create', $data);
    }

    public function store(StoreRequest $request)
    {
        $request['user_id'] = auth()->user()->id;
        if ($request->post_type == PostType::ARTICLE) :
            $request['video_url'] = null;
        endif;

        $request['status'] = Status::UNPUBLISH;
        if ($this->repo->store($request)) :
            $notification = array(
                'message' => 'Post Create Successfully',
                'alert-type' => 'success'
            );
        else :
            $notification = array(
                'message' => 'Someting went wrong!',
                'alert-type' => 'error'
            );
        endif;
        return redirect()->route('post.list')->with($notification);
    }

    public function edit($id)
    {
        $data['page_name'] = 'Edit Post';
        $data['post'] = Post::find($id);
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['subcategories'] = Category::where('parent_id', $data['post']->category_id)->get();
        return view('auth.posts.post_edit', $data);
    }


    public function update(StoreRequest $request)
    {
        if ($request->post_type == PostType::ARTICLE) :
            $request['video_url'] = null;
        endif;

        $columns = ['treding_topic', 'stories', 'breaking', 'recommended'];
        foreach ($columns as   $value) {
            if (!$request->$value) :
                $request[$value] = 0;
            endif;
        }

        if ($this->repo->update($request)) :
            $notification = array(
                'message' => 'Post Updated Successfully',
                'alert-type' => 'success'
            );
        else :
            $notification = array(
                'message' => 'Someting went wrong!',
                'alert-type' => 'error'
            );
        endif;
        return redirect()->route('post.list')->with($notification);
    }

    public function delete($id)
    {
        if ($this->repo->delete($id)) :
            $notification = array(
                'message' => 'Post Deleted Successfully',
                'alert-type' => 'success'
            );
        else :
            $notification = array(
                'message' => 'Someting went wrong!',
                'alert-type' => 'error'
            );
        endif;
        return redirect()->route('post.list')->with($notification);
    }
}
