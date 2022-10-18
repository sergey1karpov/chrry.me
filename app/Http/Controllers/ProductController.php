<?php

namespace App\Http\Controllers;

use App\Exceptions\NotLinkProductException;
use App\Http\Requests\OrderProductRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Order;
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

        $products = Product::where('user_id', $userId)->orderBy('position')->get();

        return view('product.products', compact('user', 'products'));
    }

    public function showProduct(int $userId, Product $product)
    {
        $user = User::findOrFail($userId);

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

    /**
     * Показать продукт и форму для отправки заявки
     *
     * @param $slug
     * @param $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function showProductDetails($slug, $product) {

        $user = User::where('slug', $slug)->first();

        $product = Product::where('user_id', $user->id)->where('id', $product)->first();

        if($product->link_to_order_text) {
            return view('product.showProduct', compact('user', 'product'));
        } else {
            abort(404);
        }

    }

    public function sortProduct(int $id)
    {
        if(isset($_POST['update'])) {
            foreach($_POST['positions'] as $position) {
                $index = $position[0];
                $newPosition = $position[1];
                Product::where('user_id', $id)->where('id', $index)->update([
                    'position' => $newPosition,
                ]);
            }
        }
    }
}


