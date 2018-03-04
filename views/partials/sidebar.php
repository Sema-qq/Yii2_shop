<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php foreach ($categories as $category): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a href="<?= yii\helpers\Url::toRoute(['/catalog/category', 'id' => $category->id]) ?>"
                               class="<?= (isset($category_id) && $category_id == $category->id) ? 'active-category' : null; ?>">
                                <?= $category->name; ?> <span class="pull-right">(<?= $category->count; ?>)</span>
                            </a>
                        </h4>
                    </div>
                </div>
            <?php endforeach; ?>
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach ($brands as $brand): ?>
                        <li>
                            <a href="<?= yii\helpers\Url::toRoute(['/catalog/brand', 'id' => $brand->id]) ?>"
                               class="<?= (isset($brand_id) && $brand_id == $brand->id) ? 'active-brand' : null; ?>">
                                <span class="pull-right">(<?= $brand->count; ?>)</span><?= $brand->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5"
                       data-slider-value="[250,450]" id="sl2"><br/>
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="/public/images/home/shipping.jpg" alt=""/>
        </div><!--/shipping-->

    </div>
</div>