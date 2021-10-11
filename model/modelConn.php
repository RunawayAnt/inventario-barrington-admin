<?php
    class modelConn{
        private $server;
        private $user;
        private $password;
        private $database;
        public $conn;

        //function contruct
        public function __construct(){
        $this->server = "localhost";
        $this->user = "root";
        $this->password = "1702";
        $this->database = "dbbarrint";
        }
        function Connect(){
        $this->conn = new mysqli($this->server,$this->user,$this->password,
        $this->database);
        $this->conn->set_charset("utf8");
        }
        function Disconnect(){
        $this->conn->close();
        }

    }
?>