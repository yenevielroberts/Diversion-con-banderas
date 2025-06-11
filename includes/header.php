
<header>
    <nav>
        <ul>
            <?php
                 if($_SESSION['user_nom'] != "no_user_regi" && $_SESSION['user_type']==='admin_user'){

                    echo"<li><a href='/logs/logout.php'>Log out</a></li>
                    <li><a href='juego.php'>Home</a></li>";
                    echo "
                      <li><a href='estatUser.php'>Estadistica del usuario</a></li>
                      <li><a href='gestionarRanking.php'>Gestionar Ranking</a></li>";
                      echo "<p>User: <strong>".$_SESSION['user_nom']."</strong></p>";
                 }else if($_SESSION['user_nom'] != "no_user_regi"){

                    echo"<li><a href='/logs/logout.php'>Log out</a></li>
                    <li><a href='juego.php'>Home</a></li>";
                    echo " <li><a href='estatUser.php'>Estadistica del usuario</a></li>
                            <li><p>User: <strong>".$_SESSION['user_nom']."</strong></p></li>";

                 }else{
                    echo "<li><a href='logs/login.php'>Iniciar sección</a></li>";
                    echo"<li><a href='ranking.php'>Ver ranking</a></li>
                        <li><a href='index.php'>Home</a></li>";

                 } 
            ?>  
        </ul>
    </nav>  
</header>