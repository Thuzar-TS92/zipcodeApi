<?php
include_once 'config/database.php';
include_once 'objects/zipcode.php';
include_once 'header/index.php';
include_once 'config/response.php';
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use config\Database;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db = (new Database())->connet();


$zipcode = new zipcode($db);
$keywords = isset($_GET["s"]) ? $_GET["s"] : "";
if(!empty($keywords)){

    $stmt = $zipcode->search($keywords);
}else{

    $stmt = $zipcode->read();
}


$num = $stmt->rowCount();

if($num>0){
    $zipcode_arr=array();
    $zipcode_arr["records"]=array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      
        extract($row);
        $zipcode_item=array(
            "id" => $id,
            "zipcode" => $zip7_code,
            "pref" => $pref,
            "city" => $city,
            "street" => $street,
           
        );
  
        array_push($zipcode_arr["records"], $zipcode_item);
    }

    sendResponse(200,$zipcode_arr,'Server Working');

}else{
    sendResponse(404,[],'No zipcode found.');
    
}