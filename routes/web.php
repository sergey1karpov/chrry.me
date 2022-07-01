<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StatisticController;

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

//Админка юзера
Route::get('/{slug}', [UserController::class, 'userHomePage'])->name('userHomePage')->middleware('redir');
Route::get('/{id}/edit-profile', [UserController::class, 'editProfileForm'])->name('editProfileForm')->middleware('loc');
Route::patch('/{id}/edit-profile/edit', [UserController::class, 'editUserProfile'])->name('editUserProfile');
Route::patch('/{id}/edit-profile/del-avatar', [UserController::class, 'delUserAvatar'])->name('delUserAvatar');
Route::patch('/{id}/edit-profile/del-banner', [UserController::class, 'delUserBanner'])->name('delUserBanner');

//Функционал
Route::get('/{id}/links', [LinkController::class, 'allLinks'])->name('allLinks');
Route::get('/{id}/search', [LinkController::class, 'searchLink'])->name('searchLink');
Route::post('/{id}/add-link', [LinkController::class, 'addLink'])->name('addLink');
Route::post('/{id}/add-post', [LinkController::class, 'addPost'])->name('addPost');
Route::patch('/{id}/add-link/{link}/edit', [LinkController::class, 'editLink'])->name('editLink');
Route::patch('/{id}/add-link/{link}/edit-post', [LinkController::class, 'editPost'])->name('editPost');
Route::delete('/{id}/add-link/{link}/delete', [LinkController::class, 'delLink'])->name('delLink');
Route::patch('/{id}/add-link/{link}/delete-photo', [LinkController::class, 'delLinkPhoto'])->name('delLinkPhoto');
Route::patch('/{id}/add-link/{link}/delete-icon', [LinkController::class, 'delLinkIcon'])->name('delLinkIcon');
Route::patch('/{id}/add-link/{link}/delete-photo-post', [LinkController::class, 'delPostPhoto'])->name('delPostPhoto');
Route::patch('/{id}/edit-links', [LinkController::class, 'editAllLink'])->name('editAllLink');

//Сортировка ссылок
Route::post('{id}/ppp/sort', [LinkController::class, 'sortLink'])->name('sortLink');

//Статистика
Route::post('/{id}/link', [StatisticController::class, 'clickLinkStatistic'])->name('clickLinkStatistic');
Route::get('/{id}/link/{link}', [StatisticController::class, 'showClickLinkStatistic'])->name('showClickLinkStatistic');

//bord.link/cc/q1w2e3r4 - вшита
Route::get('cc/{utag}', [UserController::class, 'editNewUserForm'])->name('editNewUserForm');
Route::patch('cc/{utag}/registered', [UserController::class, 'editNewUser'])->name('editNewUser');
