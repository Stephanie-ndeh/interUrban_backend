<?php

/* 
@description: this file allow you to configure somes aspects of your 
framework like language,database..
*/
setConfig([
    // 
    "loggedURl" => "home",
    "app_name" => "tplan",

    // "base_url" => "https://tplan.multipresta.com/back/",
    // "frontend_url" => "https://tplan.multipresta.com/front/",

    "frontend_url" => "http://127.0.0.1:5501/frontend/",
    "base_url" => "http://127.0.0.1/wed/",

    // "app_name" => "sail-php",

    "language" => "en",
    "database" =>
    [
        "host" => "localhost",

        "pass" => "",
        "dbname" => "tableplan",
        "user" => "root",

        // "user" => "john007_wedbackend",
        // "pass" => "wedbackend24_",
        // "dbname" => "john007_wedbackend",

    ],
    "paths" => [
        "controllers_folder" => "app/controllers/",
        "models_folder" => "app/models/",
        "views_folder" => "app/views/",
        "libraries_folder" => "app/libraries/",
        "validations_folder" => "app/validations/",
        "schemas_folder" => "app/schemas/",
        "languages_folder" => "app/language/",
        "storage_folder" => "app/storage/",
    ],
    "mode" => "debug",
    "urlLangPrefix" => ["en", "fr"],
    "session" => [
        "driver" => "file",
        "lifetime" => 120,
    ]

]);
