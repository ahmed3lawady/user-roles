<?php

namespace Ahmed3lawady\UserRole\Controller;

use Ahmed3lawady\UserRole\UserRole;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class UserRoleController extends Controller
{
    public function index()
    {
        return view('ahmed3lawady.user-roles.views.list', ['roles' => UserRole::all()]);
    }

    public function create()
    {
        $title = trans('roles.create-new-role');
        $routeActions = collect(Route::getRoutes()->getRoutes())->reject(function ($itm){
            return $itm->getAction()['namespace'] != config('roles.controller-path');
        })->map(function ($itm){
            $act = explode('@', str_replace($itm->getAction()['namespace'].'\\', '', $itm->getAction()['controller']));
            return $act[0];
        })->unique();

        return view('ahmed3lawady.user-roles.views.form', compact('routeActions', 'title'));
    }

    public function store()
    {
    	return (UserRole::create(request(['title', 'roles']))) ?
            back()->with('msg', trans('roles.saved-msg')) :
            back()->with('msg', trans('roles.error-msg'));
    }

    public function edit(UserRole $role)
    {
        $title = trans('roles.update-role');
        $routeActions = collect(Route::getRoutes()->getRoutes())->reject(function ($itm){
            return $itm->getAction()['namespace'] != config('roles.controller-path');
        })->map(function ($itm){
            $act = explode('@', str_replace($itm->getAction()['namespace'].'\\', '', $itm->getAction()['controller']));
            return $act[0];
        })->unique();

        return view('ahmed3lawady.user-roles.views.form', compact('role', 'routeActions', 'title'));
    }

    public function update(UserRole $role)
    {
        return ($role->update(request(['title', 'roles']))) ?
            back()->with('msg', trans('roles.updated-msg')) :
            back()->with('msg', trans('roles.error-msg'));
    }

    public function destroy($id)
    {
        return (UserRole::destroy($id)) ?
            back()->with('msg', trans('roles.deleted-msg')) :
        	back()->with('msg', trans('roles.error-msg'));
    }
}
