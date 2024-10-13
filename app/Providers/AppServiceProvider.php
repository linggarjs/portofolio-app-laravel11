<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Skill;
use App\Models\Profile;

class AppServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
          $skills = Skill::all();
          $view->with('skills', $skills);
        });
      
        View::composer(['projects.index', 'projects.show'], function ($view) {
          $projects = Project::with('skills')->get();
          $view->with('projects', $projects);
        });
        
        View::composer('layout', function ($view) {
            $profile = Profile::first();
            $view->with('profile', $profile);
        });
    }
}
