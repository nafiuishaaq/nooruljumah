<?php

    class file extends Dbh {
        public function addFile($scholar_id,$user_id,$file_title,$file_desc,$file_image) {
            $sql = "INSERT INTO users(scholar_id,u_id,file_title,file_desc,file_image,date) values (?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$scholar_id,$user_id,$file_title,$file_desc,$file_image,date('D M Y')]);
           /// return $stmt;
        }
        

        public function getFiles() {
            $sql = "SELECT * FROM files";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getScholarFiles($id) {
            $sql = "SELECT * FROM files WHERE scholar_id = '$id'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getAllFiles($id) {
            $sql = "SELECT * FROM files WHERE file_id = '$id'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getRecentFromScholar($id) {
            $sql = "SELECT * FROM `files` WHERE scholar_id = '$id' ORDER BY file_id DESC LIMIT 5";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getTotalFiles() {
            $sql = "SELECT count(*) as total FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            return $result;
            }
        

    }

    