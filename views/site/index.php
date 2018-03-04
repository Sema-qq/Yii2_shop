<?= $this->render('/partials/slider');?>
<section>
    <div class="container">
        <div class="row">
            <?= $this->render('/partials/sidebar', compact('categories', 'brands'));?>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?= $this->render('/partials/products', compact('products'));?>
                </div><!--features_items-->

                <?= $this->render('/partials/category-tab', compact('categories'));?>

                <?= $this->render('/partials/recomended', compact('recommendedProducts'));?>

            </div>
        </div>
    </div>
</section>