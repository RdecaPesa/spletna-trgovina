<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>spletna trgovina</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700,800' rel='stylesheet'
          type='text/css'>
</head>

<?php
$izdelki = array(
    array(
        "ime" => "Maline",
        "zaloga" => 0,
        "cena" => "0,5kg/5€"
    ),
    array(
        "ime" => "Jabolka",
        "zaloga" => 2,
        "cena" => "0,5kg/1€"
    ),
    array(
        "ime" => "Ribez",
        "zaloga" => 3,
        "cena" => "0,5kg/7€"
    ));
?>


<body>
<div class="container">
    <div class="col-sm-4 header">
        <h1>Eko</h1>
        <h2>spletna trgovina</h2>        
    </div>
    
    <?php
    // ob submitu forme
    if (isset($_POST['submit'])) {
        if($_POST['izdelek'] != '' && $_POST['kolicina'] != '' && $_POST['ime'] != '' && $_POST['naslov'] != '') {
            // izpis računa
            echo "<p class='racun'>Račun:</p>";
            echo "<p class='obvestilo'>Spoštovani <em>". $_POST['ime'] ."</em>, <br> izbrali ste izdelek <em>". ($izdelki[$_POST['izdelek']]['ime']) ."</em>, <br> količina: <em>
" . $_POST['kolicina'] ."</em></p>";
            // preveri zalogo in izpiše ustrezno opozorilo, če ni zadostne zaloge
            if($izdelki[$_POST['izdelek']]['zaloga'] == 0 || $izdelki[$_POST['izdelek']]['zaloga'] <
                $_POST['kolicina']) {
                echo "<p class='obvestilo'>Izbrane količine izdelka žal ni na zalogi, na voljo je le <em>" .
                    $izdelki[$_POST['izdelek']]['zaloga'] ."</em> kos(ov).</p>";
            }
            // drugače pa izpiše
            else {
                echo "<p class='obvestilo'>Izdelek bomo poslali na navedeni naslov: <br> <em>". $_POST['naslov'] ."</em></p>";
            }

        } else {
            echo "<p class='obvestilo'>Potrebno je vnesti vsa polja.</p>";
        }
        echo "<p class='nazaj'><a href='index.php'>Nazaj</a></p>";

    } // na začetku prikaže formo
    else {

        ?>
        <div class="col-sm-4 vsebina">
        <p>Izberi izdelek:</p>
        <!-- forma za izbiro izdelkov -->
        <form action="index.php" method="post">
            <div class="form-group">
                <select class="selectpicker" name="izdelek">
                    <?php
                    foreach ($izdelki as $key => $izdelek) {
                        echo "<option value='" . $key . "'>" . $izdelek['ime'] . " " . $izdelek['cena'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group kolicina">
                <label for="naslov">Količina</label>
                <input type="text" name="kolicina" class="form-control" id="kolicina" placeholder="Količina">
            </div>

            <div class="podatki">
                <p>Naslov:</p>

                <div class="form-group">
                    <label for="contact_name">Ime in priimek</label>
                    <input type="text" name="ime" class="form-control" id="contact_name" placeholder="Vaše ime">
                </div>

                <div class="form-group">
                    <label for="naslov">Naslov</label>
                    <input type="text" name="naslov" class="form-control" id="naslov" placeholder="Vaš naslov">
                </div>

                <button type="submit" name="submit" class="btn btn-default">Pošlji</button>
            </div>
        </form>

    <?php
    }
    ?>
    </div>
</div>

</body>
</html>
