<?= $this->render('/partials/slider');?>
<section>
    <div class="container">
        <div class="row">
            <?= $this->render('/partials/sidebar', compact('categories', 'brands'));?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>

                    <?php foreach ($products as $product):?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= $product->getImage();?>" alt="" />
                                        <h2>$<?= $product->price;?></h2>
                                        <p><?= $product->name;?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>$<?= $product->price;?></h2>
                                            <p><?= $product->name;?></p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                    <?php if ($product->is_new):?>
                                        <img src="/public/images/home/new.png" class="new" alt="" />
                                    <?php endif;?>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;?>

                </div><!--features_items-->

                <?= $this->render('/partials/category-tab', compact('categories'));?>

                <?= $this->render('/partials/recomended', compact('recommendedProducts'));?>

            </div>
        </div>
    </div>
</section>