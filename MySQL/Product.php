<?php

use Php_Api\WebScraper;

include("php_api/WebScraper.php");


$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbname = "Product";

$connection = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbname, 3306);

$web_scrapper = new WebScraper();

$ASIN = $web_scrapper->get_ASIN();
$Title = $web_scrapper->get_Title();
$Ratings = $web_scrapper->get_Ratings();
$ReviewStars = $web_scrapper->get_ReviewStars();
$BrandName = $web_scrapper->get_BrandName();
$Price = $web_scrapper->get_Price();
$ImageURL = $web_scrapper->get_ImageURL();


$sql = "INSERT INTO Product_Info (ASIN, Title, Ratings, ReviewStars, BrandName, Price
, ImageURL) VALUES ($ASIN, $Title, $Ratings, $ReviewStars, $BrandName, $Price, $ImageURL[1]);";
mysqli_query($connection, $sql);
