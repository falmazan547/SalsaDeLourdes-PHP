<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">

    <?php include '../View/side_nav.php'; ?>

    <div class="col-sm-10">
        <div class="col-md-6">
        <h2>Shipping Info</h2>
        <form class="form" method="post" action="index.php">
            <input type="hidden" name="action" value="user_update">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="first_name"><h4>First name</h4></label>
                    <input type="text" class="form-control" name="first_name" value="<?php xecho($first_name) ?>" placeholder="First Name">
                    <?php if (!empty($error_first)) { ?>
                        <p class="error"><?php xecho($error_first); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-sm-12">
                    <label for="last_name"><h4>Last name</h4></label>
                    <input type="text" class="form-control" name="last_name" value="<?php xecho($last_name) ?>" placeholder="Last Name">
                    <?php if (!empty($error_last)) { ?>
                        <p class="error"><?php xecho($error_last); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-sm-12">
                    <label for="email"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" value="<?php xecho($email) ?>" placeholder="email">
                    <?php if (!empty($error_email)) { ?>
                        <p class="error"><?php xecho($error_email); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update Info</button>

                </div>
            </div>
        </form>
        </div>
        <div class="col-md-6">
        <h2>Billing Info</h2>
        <form class="form" method="post" action="index.php">
            <input type="hidden" name="action" value="user_update">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="first_name"><h4>First name</h4></label>
                    <input type="text" class="form-control" name="first_name" value="<?php xecho($first_name) ?>" placeholder="First Name">
                    <?php if (!empty($error_first)) { ?>
                        <p class="error"><?php xecho($error_first); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-sm-12">
                    <label for="last_name"><h4>Last name</h4></label>
                    <input type="text" class="form-control" name="last_name" value="<?php xecho($last_name) ?>" placeholder="Last Name">
                    <?php if (!empty($error_last)) { ?>
                        <p class="error"><?php xecho($error_last); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-sm-12">
                    <label for="email"><h4>Email</h4></label>
                    <input type="email" class="form-control" name="email" value="<?php xecho($email) ?>" placeholder="email">
                    <?php if (!empty($error_email)) { ?>
                        <p class="error"><?php xecho($error_email); ?></p>
                    <?php } ?>
                </div>
            
                <div class="col-xs-12">
                    <br>
                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Update Info</button>

                </div>
            </div>
        </form>
        </div>
    </div>
</div>
<?php include '../View/footer.php'; ?>