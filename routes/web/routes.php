<?php
//categories
uri('admin/category', 'Application\Controllers\Admin\Category', 'index');
uri('admin/category/create', 'Application\Controllers\Admin\Category', 'create');
uri('admin/category/store', 'Application\Controllers\Admin\Category', 'store', 'POST');
uri('admin/category/edit/{id}', 'Application\Controllers\Admin\Category', 'edit');
uri('admin/category/update/{id}', 'Application\Controllers\Admin\Category', 'update', 'POST');
uri('admin/category/delete/{id}', 'Application\Controllers\Admin\Category', 'delete');
//posts
uri('admin/post', 'Application\Controllers\Admin\Post', 'index');
uri('admin/post/create', 'Application\Controllers\Admin\Post', 'create');
uri('admin/post/store', 'Application\Controllers\Admin\Post', 'store', 'POST');
uri('admin/post/edit/{id}', 'Application\Controllers\Admin\Post', 'edit');
uri('admin/post/update/{id}', 'Application\Controllers\Admin\Post', 'update', 'POST');
uri('admin/post/delete/{id}', 'Application\Controllers\Admin\Post', 'delete');
uri('admin/post/selected/{id}', 'Application\Controllers\Admin\Post','selected');
uri('admin/post/breaking-news/{id}', 'Application\Controllers\Admin\Post','breakingNews');

//banners
uri('admin/banner', 'Application\Controllers\Admin\Banner', 'index');
uri('admin/banner/create', 'Application\Controllers\Admin\Banner', 'create');
uri('admin/banner/store', 'Application\Controllers\Admin\Banner', 'store', 'POST');
uri('admin/banner/edit/{id}', 'Application\Controllers\Admin\Banner', 'edit');
uri('admin/banner/update/{id}', 'Application\Controllers\Admin\Banner', 'update', 'POST');
uri('admin/banner/delete/{id}', 'Application\Controllers\Admin\Banner', 'delete');
//users
uri('admin/user', 'Application\Controllers\Admin\User', 'index');
uri('admin/user/create', 'Application\Controllers\Admin\User', 'create');
uri('admin/user/store', 'Application\Controllers\Admin\User', 'store', 'POST');
uri('admin/user/edit/{id}', 'Application\Controllers\Admin\User', 'edit');
uri('admin/user/update/{id}', 'Application\Controllers\Admin\User', 'update', 'POST');
uri('admin/user/delete/{id}', 'Application\Controllers\Admin\User', 'delete');
uri('admin/user/change-permission/{id}', 'Application\Controllers\Admin\User', 'changePermission');

//comments
uri('admin/comment', 'Application\Controllers\Admin\Comment', 'index');
uri('admin/comment/show/{id}', 'Application\Controllers\Admin\Comment', 'show');
uri('admin/comment/change-status/{id}', 'Application\Controllers\Admin\Comment', 'changeStatus');

//menus
uri('admin/menu', 'Application\Controllers\Admin\Menu', 'index');
uri('admin/menu/create', 'Application\Controllers\Admin\Menu', 'create');
uri('admin/menu/store', 'Application\Controllers\Admin\Menu', 'store', 'POST');
uri('admin/menu/edit/{$id}', 'Application\Controllers\Admin\Menu', 'edit');
uri('admin/menu/update/{$id}', 'Application\Controllers\Admin\Menu', 'update', 'POST');
uri('admin/menu/delete/{$id}', 'Application\Controllers\Admin\Menu', 'delete' );

//setting
uri('admin/setting', 'Application\Controllers\Admin\Setting','index');
uri('admin/setting/edit', 'Application\Controllers\Admin\Setting', 'edit');
uri('admin/setting/update', 'Application\Controllers\Admin\Setting', 'update', 'POST');