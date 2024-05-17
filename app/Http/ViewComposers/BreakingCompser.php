<?php

namespace App\Http\ViewComposers;

use App\Models\Post;
use Illuminate\View\View;

class BreakingCompser
{
    /**
     * @param View $view
     */

    public function compose(View $view)
    {
        $data       = Post::where('breaking',1)->orderByDesc('id')->get();
        $view->with('breaking_posts', $data);
    }
}
