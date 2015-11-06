<?php
/**
 * Created by PhpStorm.
 * User: LIS
 * Date: 06.11.2015
 * Time: 13:33
 */

function DB_connection(){
    $host =  'localhost';
    $dbName = 'dva_proraba';
    $dbUser = 'root';
    $dbPass = '';
    return new PDO("mysql:host=$host;dbname=$dbName", $dbUser, $dbPass);
}

