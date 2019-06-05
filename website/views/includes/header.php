<header id="main-header">
  <nav class="navbar navbar-expand-sm navbar-light bg-light fixed-top">
    <div class="container">
      <a href="./" class="navbar-brand">
        <i class="fas fa-leaf"></i>
        Connected Flowers
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="./#home" class="nav-link">Accueil</a>
          </li>
          <li class="nav-item">
            <a href="./#presentation" class="nav-link">Présentation</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#connectionModal">Connexion</a>
          </>
          <li class="nav-item">
            <a href="#" class="nav-link" data-toggle="modal" data-target="#registrationModal">Inscription</a>
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

  if (isset($_GET['error']) && !empty($_GET['error']) && is_numeric($_GET['error']) && intval($_GET['error']) == 1) {
  ?>
    <div class="log-danger-message alert alert-danger mb-0">
      <div class="container">
        <p class="error-message p-0 m-0">Vous devez être connecté pour accéder à cette page.</p>
      </div>
    </div>
  <?php
  }
  ?>
</header>

<!-- MODALS -->
<div class="modal fade" id="connectionModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Connexion</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./" method="POST" id="form-connection">
          <div class="form-group">
            <input type="email" class="form-control" name="email-c" placeholder="Adresse email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password-c" placeholder="Mot de passe" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="form-connection" class="btn btn-success btn-block" form="form-connection">Se conneter</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="registrationModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Inscription</h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="./" method="POST" id="form-registration">
          <div class="form-group">
            <input type="text" class="form-control" name="first-name-r" placeholder="Prénom" required>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="last-name-r" placeholder="Nom" required>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email-r" placeholder="Adresse email" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password-r" placeholder="Mot de passe" required>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password-confirm-r" placeholder="Confirmation du mot de passe" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" name="form-registration" class="btn btn-success btn-block" form="form-registration">S'inscrire</button>
      </div>
    </div>
  </div>
</div>