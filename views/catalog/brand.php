<section id="advertisement">
    <div class="container">
        <img src="/public/images/shop/advertisement.jpg" alt="" />
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <?= $this->render('/partials/sidebar', compact('categories', 'brands', 'brand_id'));?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Brand Items</h2>
                    <?= $this->render('/partials/products', compact('products'));?>
                </div><!--features_items-->
                <?= yii\widgets\LinkPager::widget(compact('pagination')); //пагинация ?>
            </div>
        </div>
    </div>
</section>