<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <h1>Your Cart</h1>
    <?php if ($subtotal == 0) : ?>
        <p>There are no items in your cart.</p>
    <?php else: ?>
        <p>To remove an item from your cart, change its quantity to 0.</p>
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="update_cart">
            <table class="table">
            <tr id="cart_header">
                <th scope="col" class="left">Item</th>
                <th scope="col" class="right">Price</th>
                <th scope="col" class="right">Quantity</th>
                <th scope="col" class="right">Total</th>
            </tr>
            <?php foreach ($items as $productID => $item) : ?>
            <tr>
                <td><?php echo htmlspecialchars($item['name']); ?></td>
                <td><?php echo htmlspecialchars($item['list_price']); ?></td>
                <td class="right">
                    <input type="text" size="3" class="form-control" name="items[<?php echo $productID; ?>]" value="<?php echo $item['quantity']; ?>">
                </td>
                <td class="right">
                    <?php echo sprintf('$%.2f', $item['line_price']); ?>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr id="cart_footer" >
                <td colspan="3" ><b>Subtotal</b></td>
                <td class="right"><?php xecho(sprintf('$%.2f',$subtotal)); ?></td>
            </tr>
            <tr>
                <td colspan="3" class="right">
                    <input type="submit" value="Update Cart">
                </td>
            </tr>
            </table>
        </form><br>
        <a class="btn btn-primary" href="../checkout" role="button">Checkout</a>
    <?php endif; ?>
</div>

<?php include '../View/footer.php'; ?>
