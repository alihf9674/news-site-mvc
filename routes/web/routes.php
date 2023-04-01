<?php
//categories
uri('admin/category', 'Application\Controllers\Category', 'index');
uri('admin/category/create', 'Application\Controllers\Category', 'create');
uri('admin/category/store', 'Application\Controllers\category', 'store', 'POST');
uri('admin/category/edit/{id}', 'Application\Controllers\category', 'edit');
uri('admin/category/update/{id}', 'Application\Controllers\category', 'update', 'POST');
uri('admin/category/delete/{id}', 'Application\Controllers\category', 'delete');
//posts
uri('admin/post', 'Application\Controllers\Post', 'index');
uri('admin/post/create', 'Application\Controllers\Post', 'create');
uri('admin/post/store', 'Application\Controllers\Post', 'store', 'POST');
uri('admin/post/edit/{id}', 'Application\Controllers\Post', 'edit');
uri('admin/post/update/{id}', 'Application\Controllers\Post', 'update', 'POST');
uri('admin/post/delete/{id}', 'Application\Controllers\Post', 'delete');
uri('admin/post/selected/{id}', 'Application\Controllers\Post','selected');
uri('admin/post/breaking-news/{id}', 'Application\Controllers\Post','breakingNews');

//banners
uri('admin/banner', 'Application\Controllers\Banner', 'index');
uri('admin/banner/create', 'Application\Controllers\Banner', 'create');
uri('admin/banner/store', 'Application\Controllers\Banner', 'store', 'POST');
uri('admin/banner/edit/{id}', 'Application\Controllers\Banner', 'edit');
uri('admin/banner/update/{id}', 'Application\Controllers\Banner', 'update', 'POST');
uri('admin/banner/delete/{id}', 'Application\Controllers\Banner', 'delete');
//users
uri('admin/user', 'Application\Controllers\User', 'index');
uri('admin/user/create', 'Application\Controllers\User', 'create');
uri('admin/user/store', 'Application\Controllers\User', 'store', 'POST');
uri('admin/user/edit/{id}', 'Application\Controllers\User', 'edit');
uri('admin/user/update/{id}', 'Application\Controllers\User', 'update', 'POST');
uri('admin/user/delete/{id}', 'Application\Controllers\User', 'delete');
uri('admin/user/change-permission/{id}', 'Application\Controllers\User', 'changePermission');

//comments
uri('admin/comment', 'Application\Controllers\Comment', 'index');
uri('admin/comment/show/{id}', 'Application\Controllers\Comment', 'show');
uri('admin/comment/change-status/{id}', 'Application\Controllers\Comment', 'changeStatus');

//menus
uri('admin/menu', 'Application\Controllers\Menu', 'index');
uri('admin/menu/create', 'Application\Controllers\Menu', 'create');
uri('admin/menu/store', 'Application\Controllers\Menu', 'store', 'POST');
uri('admin/menu/edit/{$id}', 'Application\Controllers\Menu', 'edit');
uri('admin/menu/update/{$id}', 'Application\Controllers\Menu', 'update', 'POST');
uri('admin/menu/delete/{$id}', 'Application\Controllers\Menu', 'delete' );

//setting
uri('admin/setting', 'Application\Controllers\Setting','index');
uri('admin/setting/edit', 'Application\Controllers\Setting', 'edit');
uri('admin/setting/update', 'Application\Controllers\Setting', 'update', 'POST');