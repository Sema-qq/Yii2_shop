<?php foreach ($products as $product):?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <a href="<?= yii\helpers\Url::toRoute(['/catalog/view', 'id' => $product->id])?>">
                        <img src="<?= $product->getImage();?>" alt="<?= $product->name;?>" />
                    </a>
                    <h2>$<?= $product->price;?></h2>
                    <p><?= $product->name;?></p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
                <?php if ($product->is_new):?>
                    <img src="/public/images/home/new.png" class="new" title="<?= $product->name;?>" />
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