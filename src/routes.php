<?php

Route::resource('/roles', 'Ahmed3lawady\UserRole\UserRoleController')->middleware(config('roles.middleware'));