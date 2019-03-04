<?php include '../View/Header.php'; ?>
<?php include '../View/Nav.php'; ?>

<div class="container">
    <h2>Horizontal form</h2>
    <form class="form-horizontal" action="post">
        <input type="hidden" name="action" value="add_user">
        <div class="form-group">
            <label class="control-label col-sm-2" for="first_name">First Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="<?php xecho($first_name); ?>" placeholder="Enter First Name" name="first_name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="last_name">Last Name:</label>
            <div class="col-sm-10">          
                <input type="text" class="form-control" value="<?php xecho($last_name); ?>" placeholder="Enter Last Name" name="last_name">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">          
                <input type="email" class="form-control" value="<?php xecho($email); ?>" placeholder="Enter Email" name="email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="username">Username:</label>
            <div class="col-sm-10">          
                <input type="text" class="form-control" value="<?php xecho($username); ?>" placeholder="Enter Username" name="username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="password">Password:</label>
            <div class="col-sm-10">          
                <input type="password" class="form-control" value="<?php xecho($password); ?>" placeholder="Enter Password" name="password">
            </div>
        </div>
        <div class="form-group">        
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </form>
</div>
<?php include '../View/Footer.php'; ?>