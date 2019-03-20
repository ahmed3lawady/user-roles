<?php

namespace Ahmed3lawady\UserRole;

use Illuminate\Support\ServiceProvider;

class UserRoleServiceProvider extends ServiceProvider
{
	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->make('Ahmed3lawady\UserRole\UserRoleController');
	}
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadRoutesFrom(__DIR__.'/routes.php');
		$this->loadMigrationsFrom(__DIR__.'/migrations');
		$this->loadViewsFrom(__DIR__.'/views', 'user-roles');
		$this->publishes([
			__DIR__.'/views' => base_path('resources/views/vendor/ahmed3lawady/user-roles'),
		]);
	}
}