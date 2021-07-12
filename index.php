<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>


    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>


</head>

<!-- Az index PHP-ba nem helyezünk el tartalmat! -->

<body>


<header></header>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="#">Navbar</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php?oldal=kezdolap">Kezdőlap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?oldal=bejelentkezes">Bejelentkezés</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?oldal=kapcsolat">Kapcsolat</a>
            </li>
        </ul>
    </div>
</nav>




<div class="container">

    <?php

        /* GET -> a címsorban van a változó értéke.     -> menüpontok közötti navigálásnál használjuk
           POST -> a háttérben küldődik el a változó értéke.    -> minden űrlapnál ezt használjuk
        */



    /* abban az esetben ha a kereső bar-ban az ?oldal=kezdolap-al akkor töltse be a kezdolap.php-t*/


    switch($_GET['oldal'])     /* a GET a böngésző címsorából veszi ki az OLDAL változó értékét */
        {
            case 'kezdolap': include 'kezdolap.php'; break;     /* case zárása a break -> ez kötelező*/
            case 'bejelentkezes': include 'bejelentkezes.php'; break;
            case 'kapcsolat': include 'kapcsolat.php'; break;

            default: include 'kezdolap.php'; break; /*ha egyik CASE sem igaz, akkor ez történik*/

        }




    ?>



</div>







<footer></footer>




</body>
</html>