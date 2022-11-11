<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//Shop
// Route::get('/shop', [ShopController::class, 'shop'])->name('shop');

/**
 * Карточка пользователя
 */
Route::get('/{slug}', [UserController::class, 'userHomePage'])->name('userHomePage');
Route::get('/{slug}/item-{product}', [ProductController::class, 'showProductDetails'])->name('showProductDetails');
Route::get('/{slug}/@{categorySlug}', [ProductController::class, 'showProductsInCategory'])->name('showProductsInCategory');

Route::get('/{slug}/search', [ProductController::class, 'fullTextSearch'])->name('fullTextSearch');
Route::get('/{slug}/search-filter', [ProductController::class, 'fullTextFilter'])->name('fullTextFilter');
Route::get('/{slug}/category-filter', [ProductController::class, 'categoryFilter'])->name('categoryFilter');

/**
 * Маршруты для функционала с nfc
 */
Route::get('cc/{utag}', [UserController::class, 'editNewUserForm'])->name('editNewUserForm');
Route::patch('cc/{utag}/registered', [UserController::class, 'editNewUser'])->name('editNewUser');

/**
 * Маршрут для заказа
 */
Route::post('/{id}/order/{product}', [OrderController::class, 'sendOrder'])->name('sendOrder');

/**
 * Счетчики статистики
 */
Route::post('/{id}/link', [StatisticController::class, 'clickLinkStatistic'])->name('clickLinkStatistic');
Route::post('/{id}/product-stats', [StatisticController::class, 'productStats'])->name('productStats');
/**
 * Личный кабинет пользователя
 */
Route::middleware(['locale', 'userCheck', 'web'])->group(function () {
    /**
     * Маршруты для работы со статистикой
     */
    Route::get('/{id}/link/{link}', [StatisticController::class, 'showClickLinkStatistic'])->name('showClickLinkStatistic');
    Route::get('/{id}/products/{product}/stats', [ProductController::class, 'statsProducts'])->name('statsProducts');
    /**
     * Маршруты отображения личного кабинета, изменения профиля, удаления файлов(фото, фон, фавикон)
     */
    Route::get('/{id}/edit-profile', [UserController::class, 'editProfileForm'])->name('editProfileForm');
    Route::get('/{id}/edit-profile/settings', [UserController::class, 'profileSettingsForm'])->name('profileSettingsForm');
    Route::patch('/{id}/edit-profile/edit', [UserController::class, 'editUserProfile'])->name('editUserProfile');
    Route::patch('/{id}/edit-profile/del-avatar', [UserController::class, 'delUserAvatar'])->name('delUserAvatar');
    Route::patch('/{id}/edit-profile/change-theme', [UserController::class, 'changeTheme'])->name('changeTheme');
    Route::get('/{id}/market-settings', [UserController::class, 'marketSettingsForm'])->name('marketSettingsForm');
    Route::patch('/{id}/market-settings/patch', [UserController::class, 'marketSettingsPatch'])->name('marketSettingsPatch');
    /**
     * Маршруты для работы со ссылками в личном кабинете пользователя
     */
    Route::get('/{id}/links', [LinkController::class, 'allLinks'])->name('allLinks');
    Route::get('/{id}/create-links', [LinkController::class, 'createLinkForm'])->name('createLinkForm');
    Route::get('/{id}/search', [LinkController::class, 'searchLink'])->name('searchLink');
    Route::post('/{id}/add-link', [LinkController::class, 'addLink'])->name('addLink');
    Route::post('/{id}/add-post', [LinkController::class, 'addPost'])->name('addPost');
    Route::patch('/{id}/add-link/{link}/edit', [LinkController::class, 'editLink'])->name('editLink');
    Route::patch('/{id}/add-link/{link}/edit-post', [LinkController::class, 'editPost'])->name('editPost');
    Route::delete('/{id}/add-link/{link}/delete', [LinkController::class, 'delLink'])->name('delLink');
    Route::patch('/{id}/add-link/{link}/delete-photo', [LinkController::class, 'delPhoto'])->name('delPhoto');
    Route::patch('/{id}/add-link/{link}/delete-icon', [LinkController::class, 'delLinkIcon'])->name('delLinkIcon');
    Route::patch('/{id}/add-link/{link}/delete-photo-post', [LinkController::class, 'delPostPhoto'])->name('delPostPhoto');
    Route::patch('/{id}/edit-links', [LinkController::class, 'editAllLink'])->name('editAllLink');
    Route::post('{id}/ppp/sort', [LinkController::class, 'sortLink'])->name('sortLink');
    /**
     * Маршруты для работы с мероприятиями в личном кабинете пользователя
     */
    Route::get('/{id}/events', [EventController::class, 'allEvents'])->name('allEvents');
    Route::get('/{id}/create-events', [EventController::class, 'createEventForm'])->name('createEventForm');
    Route::post('/{id}/events/add-event', [EventController::class, 'addEvent'])->name('addEvent');
    Route::patch('/{id}/events/{event}/edit', [EventController::class, 'editEvent'])->name('editEvent');
    Route::delete('/{id}/events/{event}/delete', [EventController::class, 'deleteEvent'])->name('deleteEvent');
    Route::get('/{id}/search-event', [EventController::class, 'searchEvent'])->name('searchEvent');
    Route::patch('/{id}/events/edit', [EventController::class, 'editAllEvent'])->name('editAllEvent');
    /**
     * Маршруты для работы с продуктами
     */
    Route::get('/{id}/products', [ProductController::class, 'allProducts'])->name('allProducts'); //Показать все продукты
    Route::get('/{id}/products/store', [ProductController::class, 'createProductForm'])->name('createProductForm'); //Форма создания продукта
    Route::post('/{id}/products/store', [ProductController::class, 'addProduct'])->name('addProduct'); //Создание продукта
    Route::get('/{id}/products/{product}/edit', [ProductController::class, 'showProduct'])->name('showProduct'); //Форма обновления продукта
    Route::patch('/{id}/products/{product}/edit', [ProductController::class, 'editProduct'])->name('editProduct'); //Обновление продукта
    Route::patch('/{id}/products/{product}/delete-photo', [ProductController::class, 'deleteAdditionalPhoto'])->name('deleteAdditionalPhoto'); //Дроп фотографий
    Route::delete('/{id}/products/{product}/delete', [ProductController::class, 'deleteProduct'])->name('deleteProduct'); //Удаление

    Route::post('{id}/product/sort', [ProductController::class, 'sortProduct'])->name('sortProduct'); //Сортировка прдуктов
    Route::get('/{id}/products/search', [ProductController::class, 'searchProducts'])->name('searchProducts'); //Поиск по продуктам
    /**
     * Маршруты для работы с категориями
     */
    Route::get('/{id}/categories', [ProductCategoryController::class, 'allCategories'])->name('allCategories');
    Route::post('/{id}/categories/add-category', [ProductCategoryController::class, 'createCategory'])->name('createCategory');
    Route::patch('/{id}/categories/{category}/edit', [ProductCategoryController::class, 'editCategory'])->name('editCategory');
    Route::delete('/{id}/categories/{category}/delete', [ProductCategoryController::class, 'deleteCategory'])->name('deleteCategory');
    Route::post('/{id}/categories/sort', [ProductCategoryController::class, 'sortCategory'])->name('sortCategory');
    /**
     * Маршруты для работы с заявками
     */
    Route::get('/{id}/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/{id}/orders/{order}/order', [OrderController::class, 'order'])->name('order');
    Route::get('/{id}/orders-in-work', [OrderController::class, 'ordersInWork'])->name('ordersInWork');
    Route::get('/{id}/orders-processed', [OrderController::class, 'ordersProcessed'])->name('ordersProcessed');
    Route::post('/{id}/orders/{order}/order-processed', [OrderController::class, 'orderProcessed'])->name('orderProcessed');
    Route::get('/{id}/orders-search', [OrderController::class, 'ordersSearch'])->name('ordersSearch');

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











