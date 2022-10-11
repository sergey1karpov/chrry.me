<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\User;
use App\Services\UploadPhotoService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $uploadService;

    public function __construct(UploadPhotoService $uploadService)
    {
        $this->uploadService = $uploadService;
    }

    /**
     * @param int $id
     * @param ProductRequest $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     *
     * Add new user product
     */
    public function addProduct(int $id, ProductRequest $request, Product $product)
    {
        $product->storeProduct($id, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * @param int $userId
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * Show all user products
     */
    public function allProducts(int $userId)
    {
        $user = User::find($userId);

        return view('product.products', [
           'user' => $user,
           'products' => $user->products,
        ]);
    }

    public function showProduct(int $id, Product $product)
    {
        $user = User::findOrFail($id);

        return view('product.editProduct', compact('user', 'product'));
    }

    /**
     * @param int $userId
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * Patch product
     */
    public function editProduct(int $userId, Product $product, Request $request)
    {
        $product->patchProduct($userId, $product, $request, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Удаление дополнительных фотографий
     *
     * @param int $userId
     * @param Product $product
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteAdditionalPhoto(int $userId, Product $product, Request $request)
    {
        $product->dropAdditionalPhoto($product, $request->photo, $this->uploadService);

        return redirect()->back();
    }

    /**
     * Удалить продукт
     *
     * @param int $userId
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteProduct(int $userId, Product $product)
    {
        $product->dropProduct($product, $this->uploadService);

        return redirect()->back();
    }
}


