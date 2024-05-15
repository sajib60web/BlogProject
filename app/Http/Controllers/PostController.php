<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Post\PostInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $repo;
    public function __construct(PostInterface $repo)
    {
        $this->repo = $repo;

        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }
    public function index()
    {

        $data['page_name'] = 'Post List';
        $data['posts'] = $this->repo->get();
        return view('admin.post.index', $data);
    }

    public function create()
    {
        $data['page_name'] = 'Create Post';
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.post.create', $data);
    }

    public function store(StoreRequest $request)
    {
        ini_set('memory_limit', '50012M');
        ini_set('max_execution_time', 90000000);
        ini_set('max_allowed_packet','100M');
        
        $request['user_id'] = auth()->user()->id;
        if ($request->post_type == PostType::ARTICLE) :
            $request['video_url'] = null;
        endif;

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
        return redirect()->route('post.index')->with($notification);
    }

    public function edit($id)
    {
        $data['page_name'] = 'Edit Post';
        $data['post'] = Post::find($id);
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['subcategories'] = Category::where('parent_id', $data['post']->category_id)->get();

        return view('admin.post.edit', $data);
    }


    public function update(StoreRequest $request)
    {

        ini_set('memory_limit', '50012M');
        ini_set('max_execution_time', 90000000);
        ini_set('max_allowed_packet','100M');

        if ($request->post_type == PostType::ARTICLE) :
            $request['video_url'] = null;
        endif;

        $columns = ['treding_topic', 'top_video_latest','top_stories','latest_stories_main','latest_stories_sub','latest_stories_right_main','latest_stories_right_sub','short_stories','breaking','top_video_recommended','slider','short_stories','main_frame','main_frame_slider','recent_article'];
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
        return redirect()->route('post.index')->with($notification);
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
        return redirect()->route('post.index')->with($notification);
    }

    public function subcategory(Request $request)
    {
        if (request()->ajax()) :

            $subcategories = Category::where('parent_id', $request->category_id)->get();
            $options = '<option value="">Select Sub-Category</option>';
            foreach ($subcategories as   $category) {
                $options .= '<option value="' . $category->id . '">' . $category->name . '</option>';
            }
            return $options;
        endif;
        return '';
    }
}
