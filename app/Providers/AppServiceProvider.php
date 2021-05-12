<?php

namespace App\Providers;

use App\View\Components\Notes\NoteTag;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use League\CommonMark\GithubFlavoredMarkdownConverter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('markdown', function ($content) {
            $converter = new GithubFlavoredMarkdownConverter([
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
            ]);
        
            return $converter->convertToHtml($content);
        });
        // Blade::component('note-tag', NoteTag::class);
    }
}
