<?php

    class scholars extends Dbh {
        public function addScholar($scholar_id,$scholar_name,$scholar_location, $scholar_desc,$scholar_image) {
            $sql = "INSERT INTO scholars(u_id,scholar_name,scholar_location,scholar_desc,scholar_img,date) values (?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$scholar_id,$scholar_name,$scholar_location, $scholar_desc,$scholar_image,date('D M Y')]);
           /// return $stmt;
        }
        

        public function getScholars() {
            $sql = "SELECT * FROM scholars";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }
        public function getScholar($id) {
            $sql = "SELECT * FROM scholars WHERE scholar_id = '$id'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getRecentScholars() {
            $sql = "SELECT * FROM `scholars` ORDER BY `scholar_id` DESC LIMIT 8";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }
        

    }

    