<?php

namespace App\Http\Controllers;

use App\Enums\PageType;
use App\Enums\PostType;
use App\Enums\Status;
use App\Models\About;
use App\Models\Comment;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Page;
use App\Models\Post;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {

        $data['page_name'] = 'Home';
        $data['color_classes'] = [];

        for ($i = 0; $i < 5; $i++) {
            $data['color_classes'][] =  'bg-color-scandal';
            $data['color_classes'][] = 'bg-color-mimosa';
            $data['color_classes'][] = 'bg-color-selago';
            $data['color_classes'][] = 'bg-color-old-lace';
        }


        $data['treding_topic_posts']  = Post::where('treding_topic', 1)->published()->orderByDesc('id')->get();
        $data['main_frame']           = Post::where('post_type', PostType::ARTICLE)->published()->orderByDesc('id')->where('main_frame',1)->take(1)->get();
        $data['main_frame_sliders']    = Post::published()->orderByDesc('id')->where('main_frame_slider',1)->get();
        $data['latest_posts']         = Post::where('post_type', PostType::ARTICLE)->published()->orderByDesc('id')->limit(6)->get();

        $data['slider_posts']         = Post::where('slider', 1)->published()->orderByDesc('id')->get();
        $data['top_stories_posts']    = Post::where('top_stories', 1)->published()->orderByDesc('total_views')->limit(3)->get();


        $data['latest_stories_main'] = Post::where('latest_stories_main', 1)->published()->orderByDesc('id')->limit(1)->get();
        $data['latest_stories_sub'] = Post::where('latest_stories_sub', 1)->published()->orderByDesc('id')->limit(2)->get();
        $data['latest_stories_right_main'] = Post::where('latest_stories_right_main', 1)->published()->orderByDesc('id')->limit(1)->get();
        $data['latest_stories_right_sub'] = Post::where('latest_stories_right_sub', 1)->published()->orderByDesc('id')->limit(5)->get();

        $data['top_video_post']         = Post::where('post_type', PostType::VIDEO)->where('top_video_main',1)->published()->get()->last();
        $data['top_video_recc_posts']   = Post::where('post_type', PostType::VIDEO)->published()->where('top_video_recommended', 1)->orderByDesc('total_views')->orderByDesc('id')->limit(6)->get();
        $data['top_video_latest_posts'] = Post::where('post_type', PostType::VIDEO)->published()->where('top_video_latest',1)->orderByDesc('id')->limit(6)->get();

        $data['recent_article_posts']           = Post::where('post_type', PostType::ARTICLE)->where('recent_article',1)->published()->orderByDesc('id')->limit(9)->get();
        $data['latest_short_stories_posts']     = Post::where('short_stories', 1)->published()->orderByDesc('id')->limit(7)->get();
        $data['recent_stories_article_posts']   = Post::where('post_type', PostType::ARTICLE)->published()->where('top_stories', 1)->orderByDesc('id')->limit(5)->get();

        $data['category_latest_posts']          = Post::published()->latest()->get()->groupBy('category_id')->take(3);
        return view('frontend.index', $data);
    }

    public function postDetails($id, $slug)
    {
        $post = Post::find($id);
        if (!$post) :
            abort(400);
        endif;
        $data['page_name'] = 'Post Details';
        $data['post'] = $post;
        $data['latest_short_stories_posts']     = Post::where('short_stories', 1)->orderByDesc('id')->limit(7)->get();
        $data['related_posts']     = Post::whereNot('id', $post->id)->where('category_id', $post->category_id)->orderByDesc('id')->limit(10)->get();
        $data['prevous_post']    = Post::where('id', '<', $post->id)->get()->last();
        $data['next_post']    = Post::where('id', '>', $post->id)->get()->last();

        return view('frontend.post_details', $data);
    }
    public function comment(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required'],
                'email' => ['required'],
                'message' => ['required']
            ]);
            $request['user_id'] = auth()->user()->id ?? null;
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
    public function categoryPosts($id, $slug)
    {
        $data['page_name'] = 'Category Posts';
        $data['posts'] = Post::where('category_id', $id)->published()->orWhere('sub_category_id', $id)->orderByDesc('id')->paginate(10);
        return view('frontend.category_posts', $data);
    }
    public function postAuthor($id)
    {
        $data['page_name'] = 'Author Posts';
        $data['posts'] = Post::where('user_id', $id)->published()->orderByDesc('id')->paginate(10);
        return view('frontend.author_posts', $data);
    }
    public function searchPosts(Request $request)
    {
        $data['page_name'] = 'Search Posts';
        $data['posts'] = Post::published()->orderByDesc('id')
            ->where(function ($query) use ($request) {
                $query->where('title', 'LIKE', '%' . $request->search . '%');
                $query->orWhere('content', 'LIKE', '%' . $request->search . '%');
                $query->orWhere('meta_title', 'LIKE', '%' . $request->search . '%');
                $query->whereHas('user', function ($queryUser) use ($request) {
                    $queryUser->orWhere('name', 'LIKE', '%' . $request->search . '%');
                });
            })
            ->paginate(10);
        return view('frontend.search_posts', $data);
    }

    public function about()
    {
        $data['page_name'] = 'About';
        $data['page'] = Page::find(PageType::ABOUT_US);
        return view('frontend.about', $data);
    }

    public function contact()
    {
        $data['page_name'] = 'Contact';
        $data['page'] = Page::find(PageType::CONTACT_US);
        $data['faqs'] = Faq::all();
        return view('frontend.contact', $data);
    }

    public function termsConditions()
    {
        $data['page_name'] = 'Terms & Conditions';
        $data['page'] = Page::find(PageType::TERMS_CONDITIONS);
        return view('frontend.terms_conditions', $data);
    }

    public function privacyPolicy()
    {
        $data['page_name'] = 'Privacy policy';
        $data['page'] = Page::find(PageType::PRIVACY_POLICY);
        return view('frontend.privacy_policy', $data);
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
        $contact->love_to_read = implode(", ", $request->love_to_read);
        $contact->save();
        $notification = array(
            'message' => 'Contact Submitted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subscribe(Request $request)
    {
        if ($request->email) {
            $subscribe_check = Subscribe::where('email', $request->email)->first();
            if (empty($subscribe_check)) {
                $subscribe = new Subscribe();
                $subscribe->email = $request->email;
                $subscribe->save();
                $notification = array(
                    'message' => 'Subscribe Successfully',
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'message' => 'Email address already in use subscribe',
                    'alert-type' => 'warning'
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $notification = array(
                'message' => 'Please input your email address',
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
    }
}
