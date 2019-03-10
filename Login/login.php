<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>
<div class="container">
    <h2>Login</h2>
    <form class="form-horizontal" method="post" action="index.php">
        <input type="hidden" name="action" value="login_attempt">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">          
                <input type="email" class="form-control" value="<?php xecho($email); ?>" placeholder="Enter Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">          
                <input type="password" class="form-control" value="<?php xecho($password); ?>" placeholder="Enter Password" name="password">
                <p class="error">
                    <?php if (!empty($login_error)) { ?>
                        <?php xecho($login_error); ?>
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