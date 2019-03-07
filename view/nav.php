<?php 
    $basedir= dirname(__DIR__);
    $basedir = explode("\\", $basedir);
    $basedir = array_pop($basedir);
?>

<!--<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <a class="navbar-brand" href="/<?php echo htmlspecialchars($basedir) ?>">Salsa De Lourdes</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Classic</a>
          <a class="dropdown-item" href="#">Tomatillo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Merch</a>
      </li>
    </ul>
    
    <ul class="navbar-nav mr-auto mr-sm-2">
        <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
        <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>-->
<nav class="navbar navbar-default navbar-fixed-top">
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
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Classic</a></li>
                <li><a class="dropdown-item" href="#">Tomatillo</a></li>
                <li role="separator" class="divider"></li>
<!--                <li class="dropdown-header">Nav header</li>-->
                <li><a href="#">Merch</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/Login?action=logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>