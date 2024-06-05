<?php

    class scholars extends Dbh {
        public function addScholar($u_id,$scholar_name,$scholar_location, $scholar_desc,$scholar_image) {
            $sql = "INSERT INTO scholars(u_id,scholar_name,scholar_location,scholar_desc,scholar_img,date) values (?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$u_id,$scholar_name,$scholar_location, $scholar_desc,$scholar_image,date('D M Y')]);
           /// return $stmt;
        }

        public function updateScholar($scholar_name,$scholar_location,$scholar_desc,$scholar_id) {
            $sql = "UPDATE `scholars` SET `scholar_name` = ?, `scholar_location` = ?, `scholar_desc` = ? WHERE `scholar_id` = ? ";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$scholar_name,$scholar_location,$scholar_desc,$scholar_id]);
           /// return $stmt;
        }

        public function deleteScholar($id) {
            $sql = "DELETE FROM scholars WHERE scholar_id = '$id' ";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute();
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

        public function getUserScholar($id) {
            $sql = "SELECT * FROM `scholars` WHERE `u_id` = '$id'";
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
            $sql = "SELECT * FROM `scholars` ORDER BY `scholar_id` DESC LIMIT 5";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getTotalScholars() {
            $sql = "SELECT count(*) as `total` FROM `scholars`";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            return $result;
            }
        
            public function getTotalUserScholars($uid) {
                $sql = "SELECT count(*) as `total` FROM `scholars` WHERE `u_id` = '$uid' ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $result =  $stmt->fetchAll();
                return $result;
                }

    }

    