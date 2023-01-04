<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('home', route('home'));
});

// home > categories >
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('categories', route('categories.index'));
});

// home > categories > create category
Breadcrumbs::for('create category', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('create category', route('categories.create'));
});

// home > categories > edit post
Breadcrumbs::for('edit category', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('categories');
    $trail->push('edit category', route('categories.edit',$category));
});

// home > posts >
Breadcrumbs::for('posts', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('posts', route('posts.index'));
});

// home > posts > create post
Breadcrumbs::for('create post', function (BreadcrumbTrail $trail) {
    $trail->parent('posts');
    $trail->push('create post', route('posts.create'));
});

// home > posts > edit post
Breadcrumbs::for('edit post', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('posts');
    $trail->push('edit post', route('posts.edit',$post));
});

// home > users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('users', route('users.index'));
});

// home > users > edit user
Breadcrumbs::for('edit user', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('users');
    $trail->push('edit user', route('users.edit',$user->id));
});

// home > update password
Breadcrumbs::for('update password', function (BreadcrumbTrail $trail, User $user) {
    $trail->parent('home');
    $trail->push('update password', route('users.editpassword',$user->id));
});


// home > permissions
Breadcrumbs::for('permissions', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('permissions', route('permissions.index'));
});

// home > permissions >create
Breadcrumbs::for('create permission', function (BreadcrumbTrail $trail) {
    $trail->parent('permissions');
    $trail->push('create permission', route('permissions.create'));
});

// home > permissions >edit
Breadcrumbs::for('edit permission', function (BreadcrumbTrail $trail,Permission $permission) {
    $trail->parent('permissions');
    $trail->push('edit permission', route('permissions.edit',$permission));
});


// home > roles
Breadcrumbs::for('roles', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('roles', route('roles.index'));
});

// home > roles > create role
Breadcrumbs::for('create role', function (BreadcrumbTrail $trail) {
    $trail->parent('roles');
    $trail->push('create role', route('roles.create'));
});

// home > roles >edit
Breadcrumbs::for('edit role', function (BreadcrumbTrail $trail,Role $role) {
    $trail->parent('roles');
    $trail->push('edit role', route('roles.edit',$role));
});