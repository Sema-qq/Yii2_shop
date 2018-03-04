<section>
    <div class="container">
        <div class="row">
            <?= $this->render('/partials/sidebar', compact('categories', 'brands'));?>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= $product->getImage();?>" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="/public/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/public/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/public/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/public/images/product-details/similar3.jpg" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <?php if ($product->is_new):?>
                                <img src="/public/images/product-details/new.jpg" class="newarrival" alt="" />
                            <?php endif;?>
                            <h2><?= $product->name;?></h2>
                            <p>Code: <?= $product->code;?></p>
                            <img src="/public/images/product-details/rating.png" alt="" />
                            <span>
									<span>US $<?= $product->price;?></span>
									<label>Quantity:</label>
									<input type="text" value="1" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
                            <?php if ($product->avialability):?>
                                <p><b>Availability:</b> In Stock</p>
                            <?php endif;?>
                            <?php if ($product->is_new):?>
                                <p><b>Condition:</b> New</p>
                            <?php endif;?>
                            <p><b>Brand:</b> <?= $product->brand->name;?></p>
                            <a href=""><img src="/public/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <?= $this->render('/partials/category-tab', compact('categories'));?>

                <?= $this->render('/partials/recomended', compact('recommendedProducts'));?>

            </div>
        </div>
    </div>
</section>