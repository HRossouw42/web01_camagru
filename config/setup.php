<?php
/**
 * Created by PhpStorm.
 * User: hrossouw
 * Date: 2018/11/29
 * Time: 12:23
 */

	require("database.php");
	// global $db;
	$db = new Db(
        array	(
            "servername"	=> "localhost",
            "username"		=> "root",
            "password"		=> "123456",
            "dbname"		=> "camagru"
        )
    );

	$usercolumns = array	(
        "customer_id INT not NULL AUTO_INCREMENT PRIMARY KEY",
        "username VARCHAR(100) not NULL",
        "`customer_pass` VARCHAR(255) not NULL",
        "customer_email VARCHAR(50) not NULL",
        "token VARCHAR(255) not NULL",
        "verified TINYINT(1) NOT NULL DEFAULT '0'",
        "notifications TINYINT(1) NOT NULL DEFAULT '1'"
    );

	$db->createTABLE(
        array	(	"name"		=>"customers",
            "columns"	=>$usercolumns
        )
    );

	$imagecolumns = array(
        "imageID INT NOT NULL AUTO_INCREMENT PRIMARY KEY",
        "image LONGBLOB not NULL",
        "username varchar(100) NOT NULL",
        "`date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
        "likes INT NOT NULL DEFAULT '0'"
    );

	$db->createTABLE(
        array	(	"name"=>"IMAGES",
            "columns"=>$imagecolumns
        )
    );

	$commcolumns = array(
        "imageID INT NOT NULL DEFAULT '0'",
        "username varchar(100) NOT NULL",
        "comment varchar(1000) NOT NULL",
        "`date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP",
    );

	$db->createTABLE(
        array	(	"name"=>"COMMENTS",
            "columns"=>$commcolumns
        )
    );

	function toQuote($string)
    {
        return "'".$string."'";
    }

    //unique registrations
	function isUnique($param, $val){
        global $db;
        $statement = "SELECT * FROM USERS WHERE ".$param." = ".toQuote($val).";";
        $count = $db->returnRecord($statement);
        return (!count($count));
    }
