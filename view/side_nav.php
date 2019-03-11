<div class="col-sm-2">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="index.php">User Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=shipping_billing_page">Shipping Info</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Security</a>
        </li>
        <?php if($_SESSION['userType'] == 'admin') {?>
        <li class="nav-item">
            <a class="nav-link" href="#">Admin</a>
        </li>
        <?php } ?>
    </ul>
</div>