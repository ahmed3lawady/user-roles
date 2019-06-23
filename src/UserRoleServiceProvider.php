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

		$this->loadMigrationsFrom(__DIR__ . '/database/migrations');
		$this->publishes([
			__DIR__.'/database/migrations/' => database_path('migrations')
		], 'migrations');

		$this->loadTranslationsFrom(__DIR__.'/resources/lang', 'roles');
		$this->publishes([
			__DIR__.'/resources/lang' => resource_path('lang/roles'),
		]);

		$this->loadViewsFrom(__DIR__ . '/views', 'user-roles');
		$this->publishes([
			__DIR__ . '/views' => resource_path('views/vendor/ahmed3lawady/user-roles')
		]);

		$this->publishes([
			__DIR__.'/config/roles.php' => config_path('roles.php')
		], 'config');
	}
}