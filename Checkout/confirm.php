<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <h1>Order Review</h1>
    <table class="table">
        <tr id="cart_header">
            <th scope="col" class="left">Item</th>
            <th scope="col" class="right">Price</th>
            <th scope="col" class="right">Quantity</th>
            <th scope="col" class="right">Total</th>
        </tr>
        <?php foreach ($items as $productID => $item) : ?>
            <tr>
                <td><?php echo xecho($item['name']); ?></td>
                <td><?php echo xecho($item['list_price']); ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo sprintf('$%.2f', $item['line_price']); ?></td>
            </tr>
        <?php endforeach; ?>
        <tr id="cart_footer" >
            <td colspan="3" ><b>Subtotal</b></td>
            <td class="right"><?php xecho(sprintf('$%.2f',$subtotal)); ?></td>
        </tr>
        <tr>
            <td colspan="3" ><b>Tax</b></td>
            <td class="right"><?php xecho(sprintf('$%.2f',$tax)); ?></td>
        </tr>
        <tr>
            <td colspan="3" ><b>Shipping</b></td>
            <td class="right"><?php xecho(sprintf('$%.2f',$shipping_cost)); ?></td>
        </tr>
        <tr>
            <td colspan="3" ><b>Total</b></td>
            <td class="right"><?php xecho(sprintf('$%.2f',$total)); ?></td>
        </tr>
    </table>
    <br>
    <a class="btn btn-primary" href="../checkout?action=confirm" role="button">Confirm</a>

</div>

<?php include '../View/footer.php'; ?>
