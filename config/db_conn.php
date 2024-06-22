<?php
    // THIS FILE IS RESPONSIBLE FOR CONNECTING THE APP TO THE DATABASE 

    // DATABASE DRIVER
    $DBDRIVER = "mysql"; 

    // DATABASE HOST
    $DBHOST = "localhost"; 

    // DATABASE USER USERNAME
    $DBUSER = "root"; 

    // DATABASE USER PASSWORD
    $DBPASS = "cado"; 

    // DATABASE NAME
    $DBNAME = "kisuzi-rental"; 


    try {
        $con = new PDO("$DBDRIVER:host=$DBHOST;dbname=$DBNAME",$DBUSER,$DBPASS);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>