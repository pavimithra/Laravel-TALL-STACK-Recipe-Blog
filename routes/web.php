<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Livewire\Users\IndexUsers;
use App\Livewire\Users\ShowUser;

use App\Livewire\Permissions\IndexPermissions;
use App\Livewire\Permissions\CreatePermission;
use App\Livewire\Permissions\UpdatePermission;
use App\Livewire\Permissions\ShowPermission;

use App\Livewire\Roles\IndexRoles;
use App\Livewire\Roles\CreateRole;
use App\Livewire\Roles\UpdateRole;
use App\Livewire\Roles\ShowRole;

use App\Livewire\Categories\IndexCategories;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\UpdateCategory;
use App\Livewire\Categories\ShowCategory;

use App\Livewire\Posts\IndexPosts;
use App\Livewire\Posts\CreatePost;
use App\Livewire\Posts\UpdatePost;
use App\Livewire\Posts\ShowPost;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Dashboard //
Route::prefix('admin')
    ->middleware(['auth', 'verified'])
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('dashboard');

    Route::get('/users', IndexUsers::class)->name('users');
    Route::get('/users/{user}/show', ShowUser::class)->name('user.show');
    
    Route::get('/permissions', IndexPermissions::class)->name('permissions');
    Route::get('/permissions/create', CreatePermission::class)->name('permission.create');
    Route::get('/permissions/{permission}/update', UpdatePermission::class)->name('permission.update');
    Route::get('/permissions/{permission}/show', ShowPermission::class)->name('permission.show');

    Route::get('/roles', IndexRoles::class)->name('roles');
    Route::get('/roles/create', CreateRole::class)->name('role.create');
    Route::get('/roles/{role}/update', UpdateRole::class)->name('role.update');
    Route::get('/roles/{role}/show', ShowRole::class)->name('role.show');

    Route::get('/categories', IndexCategories::class)->name('categories');
    Route::get('/categories/create', CreateCategory::class)->name('category.create');
    Route::get('/categories/{category}/update', UpdateCategory::class)->name('category.update');
    Route::get('/categories/{category}/show', ShowCategory::class)->name('category.show');

    Route::get('/posts', IndexPosts::class)->name('posts');
    Route::get('/posts/create', CreatePost::class)->name('post.create');
    Route::get('/posts/{post}/update', UpdatePost::class)->name('post.update');
    Route::get('/posts/{post}/show', ShowPost::class)->name('post.show');

});

Route::permanentRedirect('/admin', '/admin/dashboard');

require __DIR__.'/auth.php';
