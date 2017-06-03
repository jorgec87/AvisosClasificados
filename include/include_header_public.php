<div class="container col-md-offset-1 col-md-11" id="Header">
    <div class="col-md-2" id="fotoHeader">
        <img src="http://2.bp.blogspot.com/-ZJNw3suLePk/VSEkX0oyQ2I/AAAAAAAAAZA/6QkRrUjHLNs/s1600/segundamano.png" class="img-responsive">
    </div> 
    <div> 
        <div class="col-md-8">
            <nav class="navbar navbar-inverse" id="menuTop">
                <ul class="nav navbar-nav">
                    <li><a id="menuText" href="index.php">Inicio</a></li>
                    <li><a id="menuText" href="#">Quienes Somos</a></li>
                    <li><a id="menuText" href="contacto.php">Contactanos</a></li>
                </ul>
            </nav>

            <h1 id="titulo">ANUNCIOS CLASIFICADOS GRATIS</h1><br>
            <span id="tituloText">publica con nosotros es GRATIS y sencillo</span>
            <button id="botonPublicar" class="btn">Publicar Aviso</button>
        </div>
        <form method="POST" action="BO/procesar_login.php">
            <div class="col-md-2" id="logInZone">
                <div class="row"><span>Usuario</span><input style="color: black;" name="usuario" type="text" id="inputLogin"></div>
                <div class="row"><span>Clave</span><input type="password" style="color: black;" name="pass" id="inputLogin"></div>
                <div class="row"><input type="checkbox"><span>Recordarme en este sitio</span></div>
                <div class="row" id="logInButtons">
                    <button type="submit" id="botonLogIn" class="btn btn-default">Iniciar Sesion</button>
                    <a href="/AvisosClasificados/registrarse.php" class="btn btn-default">Registrarse</a>
                </div>
            </div>   
        </form>
    </div>
</div>
