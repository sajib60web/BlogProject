<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;

class SiteMapController extends Controller
{
    public function sitemap()
    {
        $allSitMap = Sitemap::create();
        $allSitMap->add(Url::create('/')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        User::get()->each(function (User $user) use ($allSitMap) {
            $allSitMap->add(
                Url::create("/author/posts/{$user->id}")
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        Category::get()->each(function (Category $category) use ($allSitMap) {
            $allSitMap->add(
                Url::create("/category/{$category->slug}")
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        Post::get()->each(function (Post $post) use ($allSitMap) {
            $allSitMap->add(
                Url::create("/post/{$post->id}/{$post->slug}")
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            );
        });
        $allSitMap->add(Url::create('/about')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $allSitMap->add(Url::create('/about')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $allSitMap->add(Url::create('/contact')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $allSitMap->add(Url::create('/terms/conditions')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $allSitMap->add(Url::create('/privacy/policy')
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0));
        $allSitMap->writeToFile(public_path('sitemap.xml'));
        // $this->info('Sitemap generated successfully.');
        $notification = array(
            'message' => 'Sitemap generated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.dashboard')->with($notification);
    }
}
