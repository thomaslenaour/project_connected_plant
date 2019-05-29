<header id="main-header">
  <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <div class="container">
      <a href="./me" class="navbar-brand">
        <i class="fas fa-leaf"></i>
        Connected Flowers
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="./me" class="nav-link">
              <i class="fas fa-user"></i> 
              Mon profil
            </a>
          </li>
          <li class="nav-item">
            <a href="./plants" class="nav-link">
              <i class="fas fa-seedling"></i> 
              Liste des plantes
            </a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION['userRank']) && $_SESSION['userRank'] == 2) {
          ?>
            <li class="nav-item mr-2">
              <a href="./admin" class="nav-link btn btn-warning">Administration</a>
            </li>
          <?php
          }
          ?>
          <li class="nav-item">
            <a href="./disconnect" class="nav-link btn btn-danger">Déconnexion</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <?php
  if (isset($errorMessage)) {
  ?>
    <div class="log-error-message alert alert-danger mb-0">
      <div class="container">
        <?= $errorMessage ?>
      </div>
    </div>
  <?php
  }
  if (isset($successMessage)) {
  ?>
    <div class="log-success-message alert alert-success mb-0">
      <div class="container">
        <?= $successMessage ?>
      </div>
    </div>
  <?php
  }
  ?>
</header>