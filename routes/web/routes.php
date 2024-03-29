<?php

use System\Router\Web\Routing;

//admin
Routing::uri('admin', 'Application\Controllers\Admin\Admin', 'dashboard');

//categories
Routing::uri('admin/category', 'Application\Controllers\Admin\Category', 'index');
Routing::uri('admin/category/create', 'Application\Controllers\Admin\Category', 'create');
Routing::uri('admin/category/store', 'Application\Controllers\Admin\Category', 'store', 'POST');
Routing::uri('admin/category/edit/{id}', 'Application\Controllers\Admin\Category', 'edit');
Routing::uri('admin/category/update/{id}', 'Application\Controllers\Admin\Category', 'update', 'POST');
Routing::uri('admin/category/delete/{id}', 'Application\Controllers\Admin\Category', 'delete');
//posts
Routing::uri('admin/post', 'Application\Controllers\Admin\Post', 'index');
Routing::uri('admin/post/create', 'Application\Controllers\Admin\Post', 'create');
Routing::uri('admin/post/store', 'Application\Controllers\Admin\Post', 'store', 'POST');
Routing::uri('admin/post/edit/{id}', 'Application\Controllers\Admin\Post', 'edit');
Routing::uri('admin/post/update/{id}', 'Application\Controllers\Admin\Post', 'update', 'POST');
Routing::uri('admin/post/delete/{id}', 'Application\Controllers\Admin\Post', 'delete');
Routing::uri('admin/post/selected/{id}', 'Application\Controllers\Admin\Post', 'selected');
Routing::uri('admin/post/breaking-news/{id}', 'Application\Controllers\Admin\Post', 'breakingNews');

//banners
Routing::uri('admin/banner', 'Application\Controllers\Admin\Banner', 'index');
Routing::uri('admin/banner/create', 'Application\Controllers\Admin\Banner', 'create');
Routing::uri('admin/banner/store', 'Application\Controllers\Admin\Banner', 'store', 'POST');
Routing::uri('admin/banner/edit/{id}', 'Application\Controllers\Admin\Banner', 'edit');
Routing::uri('admin/banner/update/{id}', 'Application\Controllers\Admin\Banner', 'update', 'POST');
Routing::uri('admin/banner/delete/{id}', 'Application\Controllers\Admin\Banner', 'delete');
//users
Routing::uri('admin/user', 'Application\Controllers\Admin\User', 'index');
Routing::uri('admin/user/create', 'Application\Controllers\Admin\User', 'create');
Routing::uri('admin/user/store', 'Application\Controllers\Admin\User', 'store', 'POST');
Routing::uri('admin/user/edit/{id}', 'Application\Controllers\Admin\User', 'edit');
Routing::uri('admin/user/update/{id}', 'Application\Controllers\Admin\User', 'update', 'POST');
Routing::uri('admin/user/delete/{id}', 'Application\Controllers\Admin\User', 'delete');
Routing::uri('admin/user/change-permission/{id}', 'Application\Controllers\Admin\User', 'changePermission');

//comments
Routing::uri('admin/comment', 'Application\Controllers\Admin\Comment', 'index');
Routing::uri('admin/comment/show/{id}', 'Application\Controllers\Admin\Comment', 'show');
Routing::uri('admin/comment/change-status/{id}', 'Application\Controllers\Admin\Comment', 'changeStatus');

//menus
Routing::uri('admin/menu', 'Application\Controllers\Admin\Menu', 'index');
Routing::uri('admin/menu/create', 'Application\Controllers\Admin\Menu', 'create');
Routing::uri('admin/menu/store', 'Application\Controllers\Admin\Menu', 'store', 'POST');
Routing::uri('admin/menu/edit/{$id}', 'Application\Controllers\Admin\Menu', 'edit');
Routing::uri('admin/menu/update/{$id}', 'Application\Controllers\Admin\Menu', 'update', 'POST');
Routing::uri('admin/menu/delete/{$id}', 'Application\Controllers\Admin\Menu', 'delete');

//setting
Routing::uri('admin/setting', 'Application\Controllers\Admin\Setting', 'index');
Routing::uri('admin/setting/edit', 'Application\Controllers\Admin\Setting', 'edit');
Routing::uri('admin/setting/update', 'Application\Controllers\Admin\Setting', 'update', 'POST');

//authentication
Routing::uri('login', 'Application\Controllers\Auth\Login', 'loginView');
Routing::uri('check-login', 'Application\Controllers\Auth\Login', 'login', 'POST');
Routing::uri('register', 'Application\Controllers\Auth\Register', 'registerView');
Routing::uri('register/store', 'Application\Controllers\Auth\Register', 'registerStore', 'POST');
Routing::uri('activate/{token}', 'Application\Controllers\Auth\Register', 'activate');
Routing::uri('forgot', 'Application\Controllers\Auth\ForgotPassword', 'forgotPasswordView');
Routing::uri('forgot/request', 'Application\Controllers\Auth\ForgotPassword', 'forgotPassword', 'POST');
Routing::uri('reset-password-form/{token}', 'Application\Controllers\Auth\ResetPassword', 'resetPasswordView');
Routing::uri('reset-password/{token}', 'Application\Controllers\Auth\ResetPassword', 'resetPassword', 'POST');
Routing::uri('logout', 'Application\Controllers\Auth\Logout', 'logout');

//app
Routing::uri('/', 'Application\Controllers\Home', 'index');
Routing::uri('/home', 'Application\Controllers\Home', 'index');
Routing::uri('/show-post/{id}', 'Application\Controllers\Home', 'show');
Routing::uri('/show-category/{id}', 'Application\Controllers\Home', 'category');
Routing::uri('/comment-store/{post_id}', 'Application\Controllers\Home', 'commentStore', 'POST');