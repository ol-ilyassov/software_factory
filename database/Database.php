<?php

/** Database Class connection to MySql */

class Database {
    //Database server
    private $host = "";
    //Database user login
    private $user = "";
    //Database user password
    private $pass = "";
    //Database name
    private $database = "";
    //Connection
    private $conn;

    public function __construct($host, $user, $pass, $database) {
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->database = $database;
    }

    public function connect() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->database);
        if (mysqli_connect_error()) {
            return null;
        } else {
            return $this->conn;
        }
    }

    //Getters and Setters.

    public function getServer() {
        return $this->host;
    }

    public function setServer($host) {
        $this->host = $host;
    }

    public function getUserName() {
        return $this->user;
    }

    public function setUserName($user) {
        $this->user = $user;
    }

    public function getUserPass() {
        return $this->pass;
    }

    public function setUserPass($pass) {
        $this->pass = $pass;
    }

    public function getDbName() {
        return $this->database;
    }

    public function setDbName($database) {
        $this->database = $database;
    }
}

