<?php

Route::resource('/roles', 'Ahmed3lawady\UserRole\UserRoleController')->middleware('admin');