<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <?php foreach ($products as $p) :?>
    <p><?php /* @var $p products */ xecho($p->getProductID()); ?></p>
    <img src="../<?php /* @var $p products */ xecho($p->getImage()); ?>">
    <p><?php /* @var $p products */ xecho($p->getCategoryName()); ?></p>
    <p><?php /* @var $p products */ xecho($p->getProductName()); ?></p>
    <p><?php /* @var $p products */ xecho($p->getDescription()); ?></p>
    <p><?php /* @var $p products */ xecho($p->getPrice()); ?></p>
    <form method="post">
        <input type="hidden" name="action" value="add_cart_item">
        <input type="hidden" name="product_id" value="<?php xecho($p->getProductID()); ?>">
        <input type="text" name="quantity" value="1" size="2" />
        <input type="submit" value="Add To Cart">
    </form>
    <?php endforeach; ?>
    <?php /* @var $products product */ //var_dump($products) ?>
</div>

