<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Content;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Fetch data from the contents table and organize it
        View::composer('*', function ($view) {
            $contents = Content::all()->mapWithKeys(function ($item) {
                // Handle image type differently
                if ($item->type === 'image') {
                    return [$item->description => $item->img_path]; // Use img_path for images
                }
                return [$item->description => $item->content]; // Use content for text
            })->toArray();

            // Share the data with all views
            $view->with('headerData', $contents);
        });
    }
}