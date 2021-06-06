<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand 
    <?php
        echo $_REQUEST['option'] == "home" ? "active" : "";
    ?>" href="home">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['option'] == "exercises" ? "active" : "";
          ?>" href="exercises">Ejercicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['option'] == "explore" ? "active" : "";
          ?>" href="explore">Explorar rutinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['option'] == "routines" ? "active" : "";
          ?>" href="routines">Mis rutinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['option'] == "others" ? "active" : "";
          ?>" href="others">Otros</a>
        </li>
      </ul>
    </div>
  </div>
</nav>