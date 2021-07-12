<h1>Bejelentkezés autószerelésre</h1>



<?php
    /* Az űrlap feldolgozása, ha megnyomta a gombot */

    if (isset($_POST['regisztracio_gomb']))
    {
        $nev = $_POST['nev'];
        $rendszam = $_POST['rendszam'];
        $gyartasi_ev = $_POST['gyartasi_ev'];
        $idopont = $_POST['idopont'];


        /*Csatlakozás adatbázishoz:*/

        $kapcsolat = mysqli_connect('localhost', 'root', '', 'autoszerelo');
        /* Általában ez localhost, még a tárhelyeken is, kivéve ha egy másik adatbázishoz kapcsolódnál,
        abban az esetben az adatbázis szerver IP címét kell megadni.*/

        /* visszafele aposztróf AlrGr+7 `` */

        mysqli_query($kapcsolat, "INSERT INTO `bejelentkezes` SET
        `id`=NULL, 
        `nev`='".$nev."',       /* `nev` = 'Sinkó Ábel' */
        `rendszam` = '".$rendszam."',
        `gyartasi_ev` = '".$gyartasi_ev."',
        `idopont` = '".$idopont."'
        ");
        
        /*
           - A táblázat neveket és az oszlopok neveit visszafele aposztrófba KELL írni -> AltGr+7
           - Az `id`-nál mindig azt kell írni, hogy NULL ! Innen tudja az adatbázis, hogy AutoIncrement lesz.
        */

        print 'Sikeres regisztráció!';

        
        mysqli_close($kapcsolat);

    }

?>

<!-- Így lehet adatot bevinni az adatbázisba -->




<form method="post">

    <input type="text" name="nev" placeholder="Teljes név" class="form-control" required>
    <input type="text" name="rendszam" placeholder="Rendszám" class="form-control" required>


    <br>
    <label for="gyartasi_ev">Gyártási év</label>
    <select name="gyartasi_ev" class="form-control" id="gyartasi_ev" required>
        <option value="">Kérjük válasszon</option> /*ha a value="" akkor így üres szövegnek tekinthető*/
        <?php
            for($ev = 1990; $ev <= 2021; $ev++)
            {
                print '<option>'.$ev.'</option>';
            }
        ?>
    </select>

    <br>
    <label for="idopont_mezo">Bejelentkezési idő</label>
    <input type="datetime-local" name="idopont" class="form-control" id="idopont_mezo" required>

    <br><br>
    <input type="submit" name="regisztracio_gomb" value="Regisztráció elküldése" class="btn btn-success">



</form>



    <br><br>
    <h2>Eddigi regisztrációk</h2>

    <!-- Így lehet adatot kiszedni az adatbázisból, így lehet LEKÉRDEZNI -->

    <?php
        $kapcsolat = mysqli_connect('localhost', 'root', '', 'autoszerelo');

        $lekerdezes = mysqli_query($kapcsolat, "SELECT * FROM `bejelentkezes` ORDER BY `id` DESC");
        /* a " * " azt jelenti, hogy mindent szeretnénk látni az adatbázisból, ORDER BY `id` DESC -> sorba rendezés id
        alapján, és csökkentő, DESC -> descending*/

        while($sor=mysqli_fetch_array($lekerdezes))
        {
            print $sor['nev'];
            print '<br>';
        }


        mysqli_close($kapcsolat);


    ?>














