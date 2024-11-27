<?php
/**
 * We halen de inloggegevens van config.php binnen
 */
include('config/config.php');

/**
 * Maak een dsn (datasourcename-string) om in te loggen 
 * op de mysql-server en database
 */
$dsn = "mysql:host=$dbHost;
        dbname=$dbName;
        charset=UTF8";

/**
 * Maak een nieuw PDO-object zodat we verbinding kunnen maken met de
 * mysql-server en database
 */
$pdo = new PDO($dsn, $dbUser, $dbPass);

/**
 * Maak een select-query die alle gegevens uit de tabel haalt
 */

$sql = "SELECT  AVE.Naam
               ,AVE.Pretpark
               ,AVE.Land
               ,AVE.Topsnelheid
               ,AVE.Hoogte

        FROM AchtbanenVanEuropa AS AVE
        
        ORDER BY AVE.Hoogte ASC";

/**
 * Met de method prepare in de PDO-class maken we
 * de query gereed om uit te voeren
 */
$statement = $pdo->prepare($sql);

/**
 * Voer de query uit
 */
$statement->execute();

/**
 * Haal het resultaat op. Er komt een indexed array binnen met
 * objecten
 */
$result = $statement->fetchAll(PDO::FETCH_OBJ);

// var_dump($result);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Achtbanen van Europa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container">  

      <div class="row">
        <div class="col-2"></div>
        <div class="col-8"><h3>Hoogste Achtbanen van Europa</h3></div>
        <div class="col-2"></div>
      </div>

      <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
          <table class="table table-hover">
            <thead>
                <th>Naam Achtbaan</th>
                <th>Naam Pretpark</th>
                <th>Land</th>
                <th>Topsnelheid</th>
                <th>Hoogte</th>
            </thead>
            <tbody>
              <?php foreach($result as $achtbaan) : ?>
                      <tr>
                        <td><?= $achtbaan->Naam ?></td>
                        <td><?= $achtbaan->Pretpark ?></td>
                        <td><?= $achtbaan->Land ?></td>
                        <td><?= $achtbaan->Topsnelheid ?></td>
                        <td><?= $achtbaan->Hoogte ?></td>
                      </tr> 
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="col-2"></div>
      </div>

      

      

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>