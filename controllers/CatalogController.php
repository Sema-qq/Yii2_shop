<?php

namespace app\controllers;

use app\models\Brand;
use app\models\Category;
use app\models\Product;
use yii\web\Controller;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        //товары с пагинацией
        $data = Product::getAll();
        //категории
        $categories = Category::getCategories();
        //производители
        $brands = Brand::getBrands();
        return $this->render('catalog', [
            'categories' => $categories,
            'brands' => $brands,
            'products' => $data['products'],
            'pagination' => $data['pagination']
        ]);
    }

    public function actionCategory($id)
    {
        //продукты выбранной категории
        $data = Category::getProductByCategoryId($id);
        //категории
        $categories = Category::getCategories();
        //производители
        $brands = Brand::getBrands();
        return $this->render('category',[
            'categories' => $categories,
            'brands' => $brands,
            'products' => $data['products'],
            'pagination' => $data['pagination'],
            'category_id' => $id
        ]);
    }

    public function actionBrand($id)
    {
        //продукты выбранной категории
        $data = Brand::getProductByBrandId($id);
        //категории
        $categories = Category::getCategories();
        //производители
        $brands = Brand::getBrands();
        return $this->render('brand',[
            'categories' => $categories,
            'brands' => $brands,
            'products' => $data['products'],
            'pagination' => $data['pagination'],
            'brand_id' => $id
        ]);
    }

    public function actionView($id)
    {
        $product = Product::findOne($id);
        //категории
        $categories = Category::getCategories();
        //производители
        $brands = Brand::getBrands();
        //рекомендуемые товары
        $recommendedProducts = Product::getRecommendedProduct();
        return $this->render('single', compact('product','categories', 'brands', 'recommendedProducts'));
    }
}