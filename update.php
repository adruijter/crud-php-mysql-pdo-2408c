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
 * Als er op de submit-knop is gedrukt
 */
if (isset($_POST['submit'])) {
    
    /**
     * Maak een update-query die een record wijzigt in de tabel
     */
    $sql = "UPDATE AchtbanenVanEuropa AS AVE
            SET
                 AVE.Naam           = :naam
                ,AVE.Pretpark       = :pretpark
                ,AVE.Land           = :land
                ,AVE.Topsnelheid    = :topsnelheid
                ,AVE.Hoogte         = :hoogte
                
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
    $statement->bindValue(':id', $_POST['Id'], PDO::PARAM_INT);
    $statement->bindValue(':naam', $_POST['naam'], PDO::PARAM_STR);
    $statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
    $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
    $statement->bindValue(':topsnelheid', $_POST['topsnelheid'], PDO::PARAM_INT);
    $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_INT);

    /**
     * Voer de query uit
     */
    $statement->execute();

    /**
     * Meld de gebruiker dat we klaar zijn en stuur hem terug naar de index-pagina
     */
    echo 'De gegevens zijn gewijzigd, u wordt doorgestuurd naar de index-pagina.';

    header('Refresh:3; url=index.php');

} else {

/**
 * Maak een query die het record ophaalt uit de tabel
 * met het meegegeven id in de url
 */
$sql = "SELECT  AVE.Id
               ,AVE.Naam
               ,AVE.Pretpark
               ,AVE.Land
               ,AVE.Topsnelheid
               ,AVE.Hoogte

        FROM AchtbanenVanEuropa AS AVE
        
        WHERE AVE.Id = :id";

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
 * Haal het resultaat op. Er komt een indexed array binnen met
 * objecten
 */
$result = $statement->fetch(PDO::FETCH_OBJ);

var_dump($result);
}

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

        <div class="row" style="display:<?= $display ?? 'none'; ?>">
            <div class="col-3"></div>
            <div class="col-6 text-center">
                <div class="alert alert-success" role="alert">
                    Record is toegevoegd, u wordt doorgestuurd naar de index-pagina.
                </div>
            </div>
            <div class="col-3"></div>
        </div>


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 text-primary">
                <h3>Wijzig de Achtbaangegevens:</h3>
            </div>
            <div class="col-3"></div>
        </div>


        <div class="row mt-3">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <label for="naamAchtbaan" class="form-label">Naam Achtbaan</label>
                        <input name="achtbaan" type="text" class="form-control" id="naamAchtbaan" 
                            aria-describedby="achtbaanHelp" placeholder="Voer een achtbaan in" value="<?= $result->Naam; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="naamPretpark" class="form-label">Naam Pretpark</label>
                        <input name="pretpark" type="text" class="form-control" id="naamPretpark" 
                            aria-describedby="pretparkHelp" placeholder="Voer een pretpark in" value="<?= $result->Pretpark ?>">
                    </div>
                    <div class="mb-3">
                        <label for="naamLand" class="form-label">Land</label>
                        <input name="land" type="text" class="form-control" id="naamLand" 
                            aria-describedby="landHelp" placeholder="Voer een land in" value="<?= $result->Land; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="topsnelheid" class="form-label">Topsnelheid</label>
                        <input name="topsnelheid" type="number" min="0" max="255" class="form-control" id="topsnelheid" 
                            aria-describedby="landHelp" placeholder="Voer een topsnelheid in" value="<?= $result->Topsnelheid; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="naamHoogte" class="form-label">Hoogte</label>
                        <input name="hoogte" type="number" min="0" max="255" class="form-control" id="naamHoogte" 
                            aria-describedby="hoogteHelp" placeholder="Voer een hoogte in" value="<?= $result->Hoogte; ?>">
                    </div>

                    <input type="hidden" name="Id" value="<?= $_GET["Id"]; ?>">
                    
                    <div class="d-grid gap-2">
                        <button name="submit" type="submit" class="btn btn-primary btn-lg mt-3" value="submit">Wijzigen</button>
                    </div>
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>