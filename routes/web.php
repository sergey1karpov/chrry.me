<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LocaleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/{slug}', [UserController::class, 'userHomePage'])->name('userHomePage')->middleware('redir');
Route::get('/{id}/edit-profile', [UserController::class, 'editProfileForm'])->name('editProfileForm')->middleware('loc');
Route::patch('/{id}/edit-profile/edit', [UserController::class, 'editUserProfile'])->name('editUserProfile');
Route::patch('/{id}/edit-profile/del-avatar', [UserController::class, 'delUserAvatar'])->name('delUserAvatar');
Route::patch('/{id}/edit-profile/del-banner', [UserController::class, 'delUserBanner'])->name('delUserBanner');

Route::post('/{id}/add-link', [LinkController::class, 'addLink'])->name('addLink');
Route::patch('/{id}/add-link/{link}/edit', [LinkController::class, 'editLink'])->name('editLink');
Route::delete('/{id}/add-link/{link}/delete', [LinkController::class, 'delLink'])->name('delLink');
Route::patch('/{id}/add-link/{link}/delete-photo', [LinkController::class, 'delLinkPhoto'])->name('delLinkPhoto');

Route::post('/{id}/link', [LinkController::class, 'clickStat'])->name('clickStat');
Route::get('/{id}/link/{link}', [LinkController::class, 'showClickStat'])->name('showClickStat');



//bord.link/cc/q1w2e3r4 - вшита
Route::get('cc/{utag}', [UserController::class, 'editNewUserForm'])->name('editNewUserForm');
Route::patch('cc/{utag}/registered', [UserController::class, 'editNewUser'])->name('editNewUser');
