<?php

namespace application\controller;

use \application\controller\base\Controller;
use \application\model\ProductsModel;
use \application\service\Application as App;

class ProductsController extends Controller
{

    /**
     * 1) site.com/home/index -> ?path=home/index
     * 2) App::dispatch -> controller = HomeController, action = action_index
     */
    public function action_index()
    {
        $productsModel = new ProductsModel;
        $products = $productsModel->getProducts();

        App::view()->render("products/index", ["products" => $products]);
    }

    /**
	 * /?path=products/productPage&id=1
	 */
    public function action_productPage()
    {

        $id = App::request()->get("id");
        $productsModel = new ProductsModel;
        $product = $productsModel->getProduct($id);

        App::view()->render("products/productPage", [
            "product" => $product
        ]);
    }
}
