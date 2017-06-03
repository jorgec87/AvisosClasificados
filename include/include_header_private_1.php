<div class="container col-md-offset-1 col-md-11" id="Header">
    <div class="col-md-2" id="fotoHeader">
        <img src="http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png" class="img-responsive">
    </div> 
    <div> 
        <div class="col-md-7">
            <nav class="navbar navbar-inverse" id="menuTop">
                <ul class="nav navbar-nav">
                    <li><a id="menuText" href="index.php">Inicio</a></li>
                    <li><a id="menuText" href="#">Quienes Somos</a></li>
                    <li><a id="menuText" href="contacto.php">Contactanos</a></li>
                </ul>
            </nav>
            <h1 id="titulo">ANUNCIOS CLASIFICADOS GRATIS</h1><br>
            <span id="tituloText">publica con nosotros es GRATIS y sencillo</span>
            <button class="btn" id="botonMisAvisos">Mis Avisos</button>
        </div>
        <div class="col-md-1">
            <span id="textoBienvenido">Bienvenido:</span>
        </div>
        <div class="col-md-2" id="loggedZone">
            <span id="textoUsuario"><?php echo $_SESSION['nombre'];?></span>
            <div class="row">
                <a id="textoOpUsuario1" href="misDatos.php">Mis Datos</a><a id="textoOpUsuario2" href="BO/cerrar_session.php">Salir</a>
            </div>  
        </div>
    </div>
</div>