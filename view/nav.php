<?php 
    $basedir= dirname(__DIR__);
    $basedir = explode("\\", $basedir);
    $basedir = array_pop($basedir);
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
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
        <li><a class="nav-link" href="/<?php echo htmlspecialchars($basedir) ?>/User_Register/index.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a class="nav-link" href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>