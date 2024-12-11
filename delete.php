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


?>