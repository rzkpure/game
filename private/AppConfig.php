<?php
/**
 * Created by PhpStorm.
 * User: MRG
 * Date: 11/5/14 AD
 * Time: 4:36 PM
 */

$configs = array(
    "application" => array(
        "name" => "Game API",
        "title" => "Game API",
        "version" => "1.0",
        "base_url" => "http://localhost/game",
        "site_url" => "http://localhost/game",
        "share_url" => "",
        "directory" => dirname(__FILE__),
        "view" => "default"
    ),
    "route"=> array(
        "base_path"=> "/game"
    ),
    "crud" => array(
        "dbhost" => "localhost",
        "dbname" => "game",
        "dbuser" => "root",
        "dbpass" => "111111",
        "theme" => "bootstrap" , // can be 'default', 'bootstrap', 'minimal' or your custom. Theme of xCRUD visual presentation. For using bootstrap you need to load it on your page.
        "language" => "en" , // sets default localization
        "dbencoding"  => "utf8", // Your database encoding, default is 'utf8'. Do not change, if not sure.
        "db_time_zone" => "", // database time zone, if you want use system default - leave empty.
        "mbencoding" => "utf-8", // Your mb_string encoding, default is 'utf-8'. Do not change, if not sure.
    ),
    "db" => array(
        "mongodb" => array(
            "host" => "localhost",
            "name" => "",
            "user" => "",
            "password" => ""
        ),
        "mysql" => array(
            "host" => "localhost",
            "name" => "",
            "user" => "",
            "password" => ""
        ),
        "medoo" => array(
            "master"=> array(
                "database_type"=> "mysql",
                "database_name" => "game",
                "server" => "localhost",
                "username" => 'root',
                'password' => '111111',

                // optional
                'port' => 3306,
                'charset' => 'utf8',
                // driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
                'option' => array(
                    PDO::ATTR_CASE => PDO::CASE_NATURAL
                )
            )
        )
    ),
    "apple_apn" => array(
        "development_file" => "",
        "development_link" => "",
        "distribution_file" => "",
        "distribution_link" => ""
    ),
    "android" => array(
        "key" => ""
    ),
    "olo" => array(
        "version" => "1.1"
    ) ,
    "views" => array(

    )
);

return $configs;