<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <?php foreach ($products as $p) : ?>
        <div class="col-sm-4">
            <img id="shop-img" src="../<?php /* @var $p products */ xecho($p->getImage()); ?>">
            <h3 id="shop-h3"><?php /* @var $p products */ xecho($p->getProductName()); ?> - $<?php /* @var $p products */ xecho($p->getPrice()); ?></h3>
            <h4 id="shop-h4">Heat Level - <?php /* @var $p products */ xecho($p->getCategoryName()); ?></h4>
            <p><?php /* @var $p products */ xecho($p->getDescription()); ?></p>
            <form method="post">
                <input type="hidden" name="action" value="add_cart_item">
                <input type="hidden" name="product_id" value="<?php xecho($p->getProductID()); ?>">
                <input type="text" name="quantity" value="1" size="2" />
                <input type="submit" value="Add To Cart">
            </form>
        </div>
    <?php endforeach; ?>
    <?php /* @var $products product */ //var_dump($products) ?>
</div>

<?php include '../View/Footer.php'; ?>
