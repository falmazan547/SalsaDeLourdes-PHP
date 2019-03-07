<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <h2>User Registration</h2>
    <form class="form-horizontal" method="post" action="index.php">
        <input type="hidden" name="action" value="add_user">
        <div class="form-group">
            <label class="control-label col-sm-2" for="first_name">First Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php xecho($first_name); ?>" placeholder="Enter First Name" name="first_name">
                <p class="error">
                    <?php if (!empty($error_first)) { ?>
                        <?php xecho($error_first); ?>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="last_name">Last Name:</label>
            <div class="col-sm-10">          
                <input type="text" class="form-control" value="<?php xecho($last_name); ?>" placeholder="Enter Last Name" name="last_name">
                <p class="error">
                    <?php if (!empty($error_last)) { ?>
                        <?php xecho($error_last); ?>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">          
                <input type="email" class="form-control" value="<?php xecho($email); ?>" placeholder="Enter Email" name="email">
                <p class="error">
                    <?php if (!empty($error_email)) { ?>
                        <?php xecho($error_email); ?>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-10">          
                <input type="text" class="form-control" value="<?php xecho($username); ?>" placeholder="Enter Username" name="username">
                <p class="error">
                    <?php if (!empty($error_username)) { ?>
                        <?php xecho($error_username); ?>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">          
                <input type="password" class="form-control" value="<?php xecho($password); ?>" placeholder="Enter Password" name="password">
                <p class="error">
                    <?php if (
                                !empty($error_password_length) || !empty($error_password_upper)|| 
                                !empty($error_password_lower) || !empty($error_password_digit) || 
                                !empty($error_password_special)
                            ){ 
                    ?>
                        <?php xecho ($error_password_length); ?>&nbsp;<br>
                        <?php xecho ($error_password_upper); ?>&nbsp;<br>
                        <?php xecho ($error_password_lower); ?>&nbsp;<br>
                        <?php xecho ($error_password_digit);?>&nbsp;<br>
                        <?php xecho ($error_password_special);?>
                    <?php } ?>
                </p>
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn button">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php include '../View/Footer.php'; ?>