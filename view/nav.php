<?php
$basedir = dirname(__DIR__);
$basedir = explode("\\", $basedir);
$basedir = array_pop($basedir);
?>

<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/<?php echo htmlspecialchars($basedir) ?>">Salsa De Lourdes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/<?php echo htmlspecialchars($basedir) ?>">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="/<?php echo htmlspecialchars($basedir) ?>/Shop">Shop</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
                <?php if(!isset($_SESSION['userID'])) {?>
                    <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                <?php }?>
                <?php if(isset($_SESSION['userID'])) {?>
                    <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Profile"><span class="glyphicon glyphicon-shopping-cart"></span> Profile</a></li>
                    <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Login?action=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                <?php }?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>