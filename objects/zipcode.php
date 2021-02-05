<?php

class zipcode{
        private $conn;
        private $table_name = "zipcode";
      
        // object properties
        public $id;
        public $pref;
        public $city;
        public $street;
        public $zip7_code;
       
      
        // constructor with $db as database connection
public function __construct($db){
            $this->conn = $db;
        }

function read(){
  
            // select all query
            $query = "SELECT * FROM ".$this->table_name." ";
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            // execute query
            $stmt->execute();
          
            return $stmt;
        }
function search($keywords){
        //  return $keywords;
         // select all query
         try {
            $query = "SELECT * FROM ".$this->table_name." WHERE zip7_code LIKE '%$keywords%'";
            // prepare query statement
            $stmt = $this->conn->prepare($query);
           
            // execute query
            $stmt->execute();
          
            return $stmt;
         } catch (\Throwable $th) {
             return $th;
         }
         
}
}