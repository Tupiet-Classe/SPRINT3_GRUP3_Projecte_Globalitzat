<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="../css/estilo_crear_curso.css" rel="stylesheet" />
    <link href="../css/fontawesome.min.css" rel="stylesheet">
    <link href="../css/brands.min.css" rel="stylesheet">
    <link href="../css/solid.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="../css/main.css"><!--header, footer-->
    <link href="../css/estiloCursos.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    
    <title>Crear Curso</title>
</head>

<body class="d-flex flex-column min-vh-100">
  <header class="sticky-top">
    <div class="navbar navbar-expand-sm p-0" id="header-logo">
        <div class="container-fluid d-flex flex-row justify-content-between navbar-nav ">
            <div class="p-2" id="logo">
                <li class="nav-item"><a class="nav-link" href="#"><img src="../images/logo_pymeshield.png"
                            alt="Logo" class="d-inline-block align-text-middle">
                        pymeshield</a></li>
            </div>

            <!--Ruptura del responsive en 576px a 575px-->
            <div class="p-2">
                <div class="container" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2" style="--bs-scroll-height: 100px;">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="menu-dropdown" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                            </a>
                            <ul class="dropdown-menu" id="menu-user">
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-address-card"></i>Editar
                                        Perfil</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-language"></i>Idioma</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-palette"></i>Tema</a>
                                </li>
                                <li><a class="dropdown-item" href="#"><i
                                            class="fa-solid fa-right-from-bracket"></i>Cerrar Sesión</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="../cliente/index.php"><i
                                    class="fa-solid fa-shield-halved">
                                </i>Modo Usuario</a></li>
                            </ul>
                        </li>
                </div>
            </div>
        </div>
    </div>
    <!--Header Logo-->


    <nav class="navbar navbar-expand-lg p-0" id="main-navbar">
        <div class="container-fluid">
            <span class="p-2">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button></span>
                <div class="collapse navbar-collapse p-0" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item"><a class="nav-link" href="index.php"><i
                                    class="fa-solid fa-house"></i>Inicio</a></li>
                      <li class="nav-item"><a class="nav-link" href="cursos.php"><i
                                    class="fa-solid fa-graduation-cap"></i>Listado Cursos</a></li>
                      <li class="nav-item"><a class="nav-link" href="usuariosCurso.php"><i
                                      class="fa-solid fa-users"></i>Listado Alumnos</a></li>
                      <li class="nav-item"><a class="nav-link" href="crearActividad.php"><i 
                          class="fa-solid fa-circle-plus"></i>Crear Actividad</a></li>
                      <li class="nav-item"><a class="nav-link" href="editarCurso.php"><i
                                    class="fa-solid fa-award"></i>Editar Curso</a></li>
                      <li class="nav-item"><a class="nav-link" href="editarNotaUsuarios.php"><i
                                    class="fa-solid fa-star"></i>Editar Nota</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="emblemasAdmin.php"><i
                            class="fa-solid fa-certificate"></i>Editar Emblemas</a>
                </li>
                    </ul>

                </div>
    </nav>
    <!--Header Menu-->

</header><!--header-->

    <main>
        <div class="container">
        <h2>Crear Curso</h2>
            <form class="formulario-crear-curso">
                <div class="form-group campo-formulario">
                    <label for="exampleInputEmail1">Nombre del Curso</label>
                    <input type="text" class="form-control" name ="nombre-del-curso" id="nombre-del-curso" required>
                    <div id="longitud" style="visibility: hidden; color:red">
                        La longitud debe ser menor a 12 caracteres.
                    </div>
                    <div id="caracteres" style="visibility: hidden; color:red">
                        No se pueden introducir los simbolos .
                    </div>
                </div>

                <div class="form-group campo-formulario">
                    <label for="exampleInputPassword1">Descripción del Curso</label>
                    <textarea class="form-control" id="descripcion-del-curso" required></textarea>
                </div>

                <div class="form-group campo-formulario">
                        <label for="exampleInputPassword1">Imagen del Curso</label>
                        <input type="file" class="form-control" id="imagen-del-curso">
                </div>
                <div class="form-group campo-formulario">
                    <label for="exampleInputPassword1">Imagen Emblema</label>
                    <input type="file" class="form-control" id="imagen-del-curso">
                </div>

                <button type="submit" class="btn btn-primary btn btn-secondary btn-sm" onclick="prov()">Guardar Curso</button>
            </form>
        </div>
    </main>

    <footer class="bg-black text-center text-lg-center mt-auto">
      <div class="text-center p-3">
          <div class="fluid-container">
              <div class="row">
                  <div id="logo-footer" class="col-6 col-md-3">
                      <a class="text-light" href="index.php"><img src="../images/logo_pymeshield_black.png"
                              alt="Logo" width="50px" style="margin-right: 5px;"
                              class="d-inline-block align-text-middle"><i class="fa-solid fa-copyright"></i>pymeshield
                          by Pymeralia</a>
                  </div>
                  <div class="col-6 col-md-3">
                      <h6 id="title-footer">Acerca de Pymeralia</h6>
                      <ul class="list-unstyled mb-0">
                          <li>
                              <a href="#" class="text-light">Política de privacidad</a>
                          </li>
                          <li>
                              <a href="#" class="text-light">Política de cookies</a>
                          </li>
                          <li>
                              <a href="#" class="text-light">Aviso legal</a>
                          </li>
                          <li>
                              <a href="#" class="text-light">Ley de protección</a>
                          </li>
                      </ul>
                  </div>
                  <div class="col-6 col-md-3">
                      <h6 id="title-footer">Contacto</h6>
                      <p><i class="fa-solid fa-phone"></i>682849274 <br> <i
                              class="fa-solid fa-envelope"></i>support@pymeralia.com</p>
                  </div>
                  <div class="col-6 col-md-3">
                      <h6 id="title-footer">RRSS</h6>
                      <ul class="list-unstyled mb-0" id="footer-rrss">
                          <li>
                              <a class="text-light" href="#"><i class="fa-brands fa-tiktok"></i></a>
                              <a class="text-light" href="#"><i class="fa-brands fa-twitter"></i></a>
                          </li>
                          </li>
                          <li>
                              <a class="text-light" href="#"><i class="fa-brands fa-instagram"></i></a>
                              <a class="text-light" href="#"><i class="fa-brands fa-facebook"></i></a>
                          </li>
                          <li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </footer><!--footer-->
  <script src="../validacions/validacions.js"></script>
  <script src="../validacions/main.js"></script>



</body>
<script>
    $( document ).ready(function() {
    console.log( "ready!" );
});
</script>
</html>