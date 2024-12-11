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
 * Maak een delete-query die een record verwijdert uit de tabel
 */
$sql = "DELETE FROM AchtbanenVanEuropa

        WHERE Id = :id";

/**
 * Met de method prepare in de PDO-class maken we
 * de query gereed om uit te voeren
 */
$statement = $pdo->prepare($sql);

/**
 * Koppel de placeholder :id aan de waarde die we binnenkrijgen
 * via de URL en het GET-array
 */
$statement->bindValue(':id', $_GET['Id'], PDO::PARAM_INT);

/**
 * Voer de query uit
 */
$statement->execute();

/**
 * Stuur de gebruiker terug naar de index-pagina
 */
header('Refresh:3; url=index.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    
    <div class="container mt-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="alert alert-success text-center" role="alert">
                    Het record is verwijderd
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>