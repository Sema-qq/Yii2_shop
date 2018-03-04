<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php foreach ($categories as $key => $category):?>
                <li <?= ($key == 0) ? 'class="active"' : null;?>>
                    <a href="#<?= $category->name;?>" data-toggle="tab"><?= $category->name;?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="tab-content">
        <?php foreach ($categories as $key =>  $category):?>
            <div class="tab-pane fade <?= ($key == 0) ? 'active in' : null;?>" id="<?= $category->name;?>" >
                <?php foreach ($category->products as $k => $product):?>
                    <?php if($k <= 3/* максимальное количество товаров в табе - 4 */):?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= $product->getImage();?>" alt="" />
                                        <h2>$<?= $product->price;?></h2>
                                        <p><?= $product->name;?></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
    </div>
</div><!--/category-tab-->