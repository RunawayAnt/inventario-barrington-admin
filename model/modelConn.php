<?php
    class modelConn{
        private $server;
        private $user;
        private $passwoard;
        private $database;
        public $conn;

        //function contruct
        public function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->passwoard = "root";
        $this->database = "dbbarrint";
        }
        function Connect(){
        $this->conn = new mysqli($this->server,$this->user,$this->passwoard,
        $this->database);
        $this->conn->set_charset("utf8");
        }
        function Disconnect(){
        $this->conn->close();
        }

    }
?>