<?php
    //Checking if the the class exist
    if (!class_exists('Conn')) {

        class Conn{
            
            public static function getConnection() {
                try {
                    //Connection parameters
                    $dsn = "mysql:dbname=outerclove_db";
                    $username = "outerclove";
                    $password = "1234";

                    $conn = new PDO($dsn, $username, $password);
                    $conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    return $conn;
                }
                catch(Exception $e){
                    throw $e;
                }
            }
        }
    }
?>