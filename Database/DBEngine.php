<?php
/* 

Filename: DBEngine.php

Author: Abdulrasaq Lawani

Purpose: One time and utilities for database through CLI.

*/

namespace Database;

use PDO;
use App\Core;
use PDOException;

class DBEngine {
    
    static function create_DB(){
        $db =Core::get_config("DB");
    
        try{
            $pdo = new PDO("sqlite:$db");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $create_simplex_options_query = 'CREATE TABLE IF NOT EXISTS simplex_options (
            id INTEGER PRIMARY KEY,
            options TEXT NOT NULL UNIQUE,
            value TEXT
            )';
    
            $create_simplex_pages_query = 'CREATE TABLE IF NOT EXISTS pages (
            page_id INTEGER PRIMARY KEY,
            page_name TEXT NOT NULL UNIQUE,
            page_content TEXT,
            date_published TEXT NOT NULL,
            date_modified TEXT NOT NULL,
            author TEXT
            )';
    
            $pdo->exec($create_simplex_options_query);
            $pdo->exec($create_simplex_pages_query); 

        } catch(PDOException $e){
            echo "Failed DB Connection: ".$e->getMessage();
            exit();
        }
    }

}