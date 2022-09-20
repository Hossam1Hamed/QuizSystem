<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\BaseRepositoryInterface;
use App\Repositories\BaseRepository;
use App\Interfaces\QuestionRepositoryInterface;
use App\Interfaces\QuizRepositoryInterface;
use App\Repositories\QuestionRepository;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\QuizRepository;
use App\Repositories\UserRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(QuizRepositoryInterface::class,QuizRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
