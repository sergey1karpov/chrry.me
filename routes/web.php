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
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\EventController;

/**
 * Auth routes
 */
require __DIR__.'/auth.php';

/**
 * Sites routes
 * - show main page of the site
 */
Route::get('/', [MainController::class, 'welcome'])->name('welcome');

/**
 * Work after scanning nfc chip
 */
Route::get('cc/{utag}', [NfcController::class, 'editNewUserForm'])->name('editNewUserForm');
Route::patch('cc/{utag}/registered', [NfcController::class, 'editNewUser'])->name('editNewUser');

/**
 * Actions on User profile page
 */
Route::prefix('{user:slug}')->group(function() {
    Route::get('/', [UserController::class, 'userHomePage'])->name('userHomePage');
    Route::get('/item-{product}', [ProductController::class, 'showProductOrderForm'])->name('showProductOrderForm');
    Route::get('/@{categorySlug}', [ProductController::class, 'showProductsInCategory'])->name('showProductsInCategory');
    Route::get('/search', [FilterAndSearchProductController::class, 'fullTextSearch'])->name('fullTextSearch');
    Route::get('/search-filter', [FilterAndSearchProductController::class, 'fullTextFilter'])->name('fullTextFilter');
    Route::get('/category-filter', [FilterAndSearchProductController::class, 'categoryFilter'])->name('categoryFilter');
});

/**
 * Order product
 */
Route::post('/{id}/order-product/{product}', [OrderController::class, 'sendOrder'])->name('sendOrder');

/**
 * Счетчики статистики
 */
Route::post('/{id}/link', [StatisticController::class, 'clickLinkStatistic'])->name('clickLinkStatistic');
Route::post('/{id}/product-stats', [StatisticController::class, 'productStats'])->name('productStats');
/**
 * Личный кабинет пользователя
 */
Route::prefix('/id{id}/')->middleware(['locale', 'userCheck', 'web'])->group(function () {
    /**
     * Маршруты для работы со статистикой
     */
    Route::get('link/{link}', [StatisticController::class, 'showClickLinkStatistic'])->name('showClickLinkStatistic');
    Route::get('products/{product}/stats', [ProductController::class, 'statsProducts'])->name('statsProducts');
    /**
     * Маршруты отображения личного кабинета, изменения профиля, удаления файлов(фото, фон, фавикон)
     */
    Route::get('edit-profile', [UserController::class, 'editProfileForm'])->name('editProfileForm');
    Route::get('edit-profile/settings', [UserController::class, 'profileSettingsForm'])->name('profileSettingsForm');
    Route::patch('edit-profile/edit', [UserController::class, 'editUserProfile'])->name('editUserProfile');
    Route::patch('edit-profile/{type}/del', [UserController::class, 'delUserAvatar'])->name('delUserAvatar');
    Route::patch('edit-profile/change-theme', [UserController::class, 'changeTheme'])->name('changeTheme');
    Route::get('market-settings', [ShopController::class, 'marketSettingsForm'])->name('marketSettingsForm');
    Route::patch('market-settings/patch', [ShopController::class, 'marketSettingsPatch'])->name('marketSettingsPatch');
    /**
     * Маршруты для работы со ссылками в личном кабинете пользователя
     */
    Route::get('links', [LinkController::class, 'allLinks'])->name('allLinks');
    Route::get('create-links', [LinkController::class, 'createLinkForm'])->name('createLinkForm');
    Route::get('search', [LinkController::class, 'searchLink'])->name('searchLink');
    Route::post('add-link', [LinkController::class, 'addLink'])->name('addLink');
    Route::post('add-post', [LinkController::class, 'addPost'])->name('addPost');
    Route::patch('add-link/{link}/edit', [LinkController::class, 'editLink'])->name('editLink');
    Route::patch('add-link/{link}/edit-post', [LinkController::class, 'editPost'])->name('editPost');
    Route::delete('add-link/{link}/delete', [LinkController::class, 'delLink'])->name('delLink');
    Route::patch('add-link/{link}/delete-photo', [LinkController::class, 'delPhoto'])->name('delPhoto');
    Route::patch('add-link/{link}/delete-icon', [LinkController::class, 'delLinkIcon'])->name('delLinkIcon');
    Route::patch('add-link/{link}/delete-photo-post', [LinkController::class, 'delPostPhoto'])->name('delPostPhoto');
    Route::patch('edit-links', [LinkController::class, 'editAllLink'])->name('editAllLink');
    Route::post('ppp/sort', [LinkController::class, 'sortLink'])->name('sortLink');
    /**
     * Маршруты для работы с мероприятиями в личном кабинете пользователя
     */
    Route::get('events', [EventController::class, 'allEvents'])->name('allEvents');
    Route::get('create-events', [EventController::class, 'createEventForm'])->name('createEventForm');
    Route::post('events/add-event', [EventController::class, 'addEvent'])->name('addEvent');
    Route::patch('events/{event}/edit', [EventController::class, 'editEvent'])->name('editEvent');
    Route::delete('events/{event}/delete', [EventController::class, 'deleteEvent'])->name('deleteEvent');
    Route::get('search-event', [EventController::class, 'searchEvent'])->name('searchEvent');
    Route::patch('events/edit', [EventController::class, 'editAllEvent'])->name('editAllEvent');
    /**
     * Маршруты для работы с продуктами
     */
    Route::get('products', [ProductController::class, 'allProducts'])->name('allProducts'); //Показать все продукты
    Route::get('products/store', [ProductController::class, 'createProductForm'])->name('createProductForm'); //Форма создания продукта
    Route::post('products/store', [ProductController::class, 'addProduct'])->name('addProduct'); //Создание продукта
    Route::get('products/{product}/edit', [ProductController::class, 'showProduct'])->name('showProduct'); //Форма обновления продукта
    Route::patch('products/{product}/edit', [ProductController::class, 'editProduct'])->name('editProduct'); //Обновление продукта
    Route::patch('products/{product}/delete-photo', [ProductController::class, 'deleteAdditionalPhoto'])->name('deleteAdditionalPhoto'); //Дроп фотографий
    Route::delete('products/{product}/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct'); //Удаление

    Route::post('product/sort', [ProductController::class, 'sortProduct'])->name('sortProduct'); //Сортировка прдуктов
    Route::get('products/search', [ProductController::class, 'searchProducts'])->name('searchProducts'); //Поиск по продуктам
    /**
     * Маршруты для работы с категориями
     */
    Route::get('categories', [ProductCategoryController::class, 'allCategories'])->name('allCategories');
    Route::post('categories/add-category', [ProductCategoryController::class, 'createCategory'])->name('createCategory');
    Route::patch('categories/{category}/edit', [ProductCategoryController::class, 'editCategory'])->name('editCategory');
    Route::delete('categories/{category}/delete', [ProductCategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::post('categories/sort', [ProductCategoryController::class, 'sortCategory'])->name('sortCategory');
    /**
     * Маршруты для работы с заявками
     */
    Route::get('orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('orders/{order}/order', [OrderController::class, 'order'])->name('order');
    Route::get('orders-in-work', [OrderController::class, 'ordersInWork'])->name('ordersInWork');
    Route::get('orders-processed', [OrderController::class, 'ordersProcessed'])->name('ordersProcessed');
    Route::post('orders/{order}/order-processed', [OrderController::class, 'orderProcessed'])->name('orderProcessed');
    Route::get('orders-search', [OrderController::class, 'ordersSearch'])->name('ordersSearch');

    Route::get('orders/export/', [ExportController::class, 'export'])->name('export');

});

/**
 * Маршруты для входа через соц сети
 */
Route::group(['middleware' => 'guest'], function() {
    /**
     * Вход через соц сети
     */
    Route::get('/{social}/auth', [AuthController::class, 'index'])->name('auth');
    Route::get('/{social}/auth/callback', [AuthController::class, 'callback'])->name('callback');
    /**
     * Маршрут если нет почты
     */
    Route::patch('{id}/confirm-registration', [AuthController::class, 'changeUserEmail'])->name('changeUserEmail');
});














