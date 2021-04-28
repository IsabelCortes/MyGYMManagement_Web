<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand 
    <?php
        echo $_REQUEST['election'] == "inicio" ? "active" : "";
    ?>" href="inicio">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['election'] == "ejercicios" ? "active" : "";
          ?>" href="ejercicios">Ejercicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['election'] == "rutinas" ? "active" : "";
          ?>" href="rutinas">Rutinas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['election'] == "imc" ? "active" : "";
          ?>" href="imc">IMC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link
          <?php
          echo $_REQUEST['election'] == "otros" ? "active" : "";
          ?>" href="otros">Otros</a>
        </li>
      </ul>
    </div>
  </div>
</nav>