<?php

namespace App\Http\Controllers;

use App\Enums\PostType;
use App\Models\About;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Post;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $data['page_name'] = 'Home';
        $data['color_classes'] = [];

        for ($i=0; $i < 5; $i++) {
            $data['color_classes'][] =  'bg-color-scandal';
            $data['color_classes'][] = 'bg-color-mimosa';
            $data['color_classes'][] = 'bg-color-selago';
            $data['color_classes'][] = 'bg-color-old-lace';
        }


        $data['treding_topic_posts']  = Post::where('treding_topic',1)->orderByDesc('id')->get();
        $data['latest_posts']         = Post::orderByDesc('post_type')->orderByDesc('id')->limit(6)->get();

        $data['slider_posts']         = Post::where('slider',1)->orderByDesc('id')->get();
        $data['top_stories_posts']    = Post::where('stories',1)->orderByDesc('total_views')->limit(3)->get();
        $data['latest_stories_posts'] = Post::where('stories',1)->orderByDesc('id')->limit(8)->get();

        $data['top_video_post']         = Post::where('post_type',PostType::VIDEO)->get()->last();
        $data['top_video_recc_posts']   = Post::where('post_type',PostType::VIDEO)->where('recommended',1)->orderByDesc('total_views')->orderByDesc('id')->limit(6)->get();
        $data['top_video_latest_posts'] = Post::where('post_type',PostType::VIDEO)->orderByDesc('id')->limit(6)->get();

        $data['recent_article_posts']           = Post::where('post_type',PostType::ARTICLE)->orderByDesc('id')->limit(9)->get();
        $data['latest_short_stories_posts']     = Post::where('short_stories',1)->orderByDesc('id')->limit(7)->get();
        $data['recent_stories_article_posts']   = Post::where('post_type',PostType::ARTICLE)->where('stories',1)->orderByDesc('id')->limit(6)->get();

        $data['category_latest_posts']          = Post::latest()->get()->groupBy('category_id');

        return view('frontend.index', $data);
    }

    public function postDetails($id,$slug){
        $post = Post::find($id);
        if(!$post):
            abort(400);
        endif;
        $data['page_name'] = 'Post Details';
        $data['post'] = $post;
        $data['latest_short_stories_posts']     = Post::where('short_stories',1)->orderByDesc('id')->limit(7)->get();
        $data['related_posts']     = Post::whereNot('id',$post->id)->where('category_id',$post->category_id)->orderByDesc('id')->limit(10)->get();
        $data['prevous_post']    = Post::where('id','<',$post->id)->get()->last();
        $data['next_post']    = Post::where('id','>',$post->id)->get()->last();
       
        return view('frontend.post_details',$data);
    }
    public function comment(Request $request){
        try {
            $request->validate([
                'name'=>['required'],
                'email'=>['required'],
                'message'=>['required']
            ]);
             $request['user_id'] = auth()->user()->id?? null;
             $comment = Comment::create($request->except('_token'));
             $notification = array(
                'message' => 'Commented Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
      
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Something went wrong.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
      
        }
    }
    public function categoryPosts($id){
        $posts = Post::where('category_id',$id)->orWhere('sub_category_id',$id)->orderByDesc('id')->paginate(10);
        $data['page_name'] = 'Post Details';
        $data['post'] = $posts;
        return view('frontend.category_posts',$data);
    }
    public function about()
    {
        $data['page_name'] = 'About';
        $data['about'] = About::find(1);
        return view('frontend.about', $data);
    }

    public function contact()
    {
        $data['page_name'] = 'Contact';
        $data['faqs'] = Faq::all();
        return view('frontend.contact', $data);
    }

    public function contactForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:191',
            'phone_number' => 'required|max:191',
            'message' => 'required'
        ]);

        $contact = new ContactMessage();
        $contact->name = $request->name;
        $contact->phone_number = $request->phone_number;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->love_to_read = implode(", ",$request->love_to_read);
        $contact->save();
        $notification = array(
            'message' => 'Contact Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
