<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\FilterAndSearchProductController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NfcController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\RootMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\EventController;

require __DIR__.'/auth.php';

Route::get('/', [MainController::class, 'welcome'])->name('welcome');

Route::get('cc/{utag}', [NfcController::class, 'editNewUserForm'])->name('editNewUserForm');
Route::patch('cc/{utag}/registered', [NfcController::class, 'editNewUser'])->name('editNewUser');

Route::prefix('{user:slug}')->group(function() {
    Route::get('/', [UserController::class, 'userHomePage'])->name('userHomePage');
    Route::get('/item-{product}', [ProductController::class, 'showProductOrderForm'])->name('showProductOrderForm');
    Route::get('/@{categorySlug}', [ProductController::class, 'showProductsInCategory'])->name('showProductsInCategory');
    Route::get('/products/item-{product}', [ProductController::class, 'showProductDetails'])->name('showProductDetails');
    Route::get('/search', [FilterAndSearchProductController::class, 'fullTextSearch'])->name('fullTextSearch');
    Route::get('/search-filter', [FilterAndSearchProductController::class, 'fullTextFilter'])->name('fullTextFilter');
    Route::get('/category-filter', [FilterAndSearchProductController::class, 'categoryFilter'])->name('categoryFilter');
});

Route::post('/{user:id}/order-product/{product:id}', [OrderController::class, 'sendOrder'])->name('sendOrder');

Route::post('/{user}/link', [StatisticController::class, 'clickLinkStatistic'])->name('clickLinkStatistic');
Route::post('/{user}/product-stats', [StatisticController::class, 'productStats'])->name('productStats');

Route::middleware(['web', 'root', 'locale'])->group(function () {
    Route::group(['prefix' => 'id{user}'], function () {
        Route::group(['prefix' => 'profile'], function () {
            Route::get('/', [UserController::class, 'editProfileForm'])->name('editProfileForm');
            Route::get('/settings', [UserController::class, 'profileSettingsForm'])->name('profileSettingsForm');
            Route::patch('/edit', [UserController::class, 'editUserProfile'])->name('editUserProfile');
            Route::patch('/{type}/del', [UserController::class, 'delUserAvatar'])->name('delUserAvatar');
            Route::patch('/change-theme', [UserController::class, 'changeTheme'])->name('changeTheme');
        });

        Route::get('/market-settings', [ShopController::class, 'marketSettingsForm'])->name('marketSettingsForm');
        Route::patch('/market-settings/patch', [ShopController::class, 'marketSettingsPatch'])->name('marketSettingsPatch');

        Route::group(['prefix' => 'links'], function() {
            Route::get('/', [LinkController::class, 'allLinks'])->name('allLinks');
            Route::get('/create', [LinkController::class, 'createLinkForm'])->name('createLinkForm');
            Route::post('/create', [LinkController::class, 'addLink'])->name('addLink')->middleware('links.count');
            Route::get('/search', [LinkController::class, 'searchLink'])->name('searchLink');
            Route::patch('/edit', [LinkController::class, 'editLink'])->name('editLink');
            Route::patch('/edit-all', [LinkController::class, 'editAllLink'])->name('editAllLink');
            Route::post('/sort', [LinkController::class, 'sortLink'])->name('sortLink');
            Route::delete('/{link}/delete', [LinkController::class, 'delLink'])->name('delLink');
            Route::patch('/{link}/delete-photo', [LinkController::class, 'delPhoto'])->name('delPhoto');
            Route::patch('/{link}/delete-icon', [LinkController::class, 'delLinkIcon'])->name('delLinkIcon');
            Route::get('/{link}/statistic', [StatisticController::class, 'showClickLinkStatistic'])->name('showClickLinkStatistic');
        });

        Route::group(['prefix' => 'events'], function() {
            Route::get('/', [EventController::class, 'allEvents'])->name('allEvents');
            Route::get('/create', [EventController::class, 'createEventForm'])->name('createEventForm');
            Route::post('/create', [EventController::class, 'addEvent'])->name('addEvent')->middleware('events.count');
            Route::get('/search', [EventController::class, 'searchEvent'])->name('searchEvent');
            Route::patch('/edit-all', [EventController::class, 'editAllEvent'])->name('editAllEvent');
            Route::patch('/{event}/edit', [EventController::class, 'editEvent'])->name('editEvent');
            Route::delete('/{event}/delete', [EventController::class, 'deleteEvent'])->name('deleteEvent');
        });

        Route::group(['prefix' => 'products'], function() {
            Route::get('/', [ProductController::class, 'allProducts'])->name('allProducts');
            Route::get('/create', [ProductController::class, 'createProductForm'])->name('createProductForm');
            Route::post('/create', [ProductController::class, 'addProduct'])->name('addProduct');
            Route::get('/search', [ProductController::class, 'searchProducts'])->name('searchProducts');
            Route::post('/sort', [ProductController::class, 'sortProduct'])->name('sortProduct');
            Route::get('/{product}/edit', [ProductController::class, 'showProduct'])->name('showProduct');
            Route::patch('/{product}/edit', [ProductController::class, 'editProduct'])->name('editProduct');
            Route::patch('/{product}/delete-photo', [ProductController::class, 'deleteAdditionalPhoto'])->name('deleteAdditionalPhoto');
            Route::delete('/{product}/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct');
            Route::get('/{product}/statistic', [ProductController::class, 'statsProducts'])->name('statsProducts');
        });

        Route::group(['prefix' => 'categories'], function() {
            Route::get('/', [ProductCategoryController::class, 'allCategories'])->name('allCategories');
            Route::post('/create', [ProductCategoryController::class, 'createCategory'])->name('createCategory');
            Route::post('/sort', [ProductCategoryController::class, 'sortCategory'])->name('sortCategory');
            Route::patch('/{category}/edit', [ProductCategoryController::class, 'editCategory'])->name('editCategory');
            Route::delete('/{category}/delete', [ProductCategoryController::class, 'deleteCategory'])->name('deleteCategory');
        });

        Route::group(['prefix' => 'orders'], function() {
            Route::get('/', [OrderController::class, 'orders'])->name('orders');
            Route::get('/in-work', [OrderController::class, 'ordersInWork'])->name('ordersInWork');
            Route::get('/in-processed', [OrderController::class, 'ordersProcessed'])->name('ordersProcessed');
            Route::get('/search', [OrderController::class, 'ordersSearch'])->name('ordersSearch');
            Route::get('/export', [ExportController::class, 'export'])->name('export');
            Route::post('/{order}/order', [OrderController::class, 'order'])->name('order');
            Route::post('/{order}/order-processed', [OrderController::class, 'orderProcessed'])->name('orderProcessed');
        });

    });
});

Route::group(['middleware' => 'guest'], function() {

    Route::get('/{social}/auth', [AuthController::class, 'index'])->name('auth');
    Route::get('/{social}/auth/callback', [AuthController::class, 'callback'])->name('callback');

    Route::patch('{id}/confirm-registration', [AuthController::class, 'changeUserEmail'])->name('changeUserEmail');
});














