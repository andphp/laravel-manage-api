<?php

namespace App\Providers;

use App\Repositories\Sys\DepartmentRepository;
use App\Repositories\Sys\Interfaces\DepartmentRepositoryInterface;
use App\Repositories\Sys\Interfaces\UserRepositoryInterface;
use App\Repositories\Sys\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * @var bool
     */
    protected $defer = true;

    public $bindings = [
        DepartmentRepositoryInterface::class => DepartmentRepository::class,
        UserRepositoryInterface::class => UserRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(
//            DepartmentRepositoryInterface::class,
//            DepartmentRepository::class
//        );
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
