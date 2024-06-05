<?php

    class files extends Dbh {
        public function addFile($scholar_id,$user_id,$file_title,$file_desc,$file_image) {
            $sql = "INSERT INTO files(scholar_id,u_id,file_title,file_desc,file_image,date) values (?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$scholar_id,$user_id,$file_title,$file_desc,$file_image,date('D M Y')]);
           /// return $stmt;
        }
        
        public function updateFile($file_title,$file_desc,$file_id) {
            $sql = "UPDATE `files` SET `file_title` = ? , `file_desc` = ? WHERE `file_id` = ?";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$file_title,$file_desc,$file_id]);
           /// return $stmt;
        }

        public function deleteFile($id) {
            $sql = "DELETE FROM files WHERE file_id = '$id' ";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute();
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

        public function getScholarFile($id) {
            $sql = "SELECT * FROM `files` WHERE `scholar_id` = '$id'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getFile($id) {
            $sql = "SELECT * FROM `files` WHERE `file_id` = '$id'";
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
            $sql = "SELECT count(*) as total FROM files";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            return $result;
            }
        
            public function getTotalUserFiles($id) {
                $sql = "SELECT count(*) as total FROM  `files` WHERE u_id = '$id' ";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                $result =  $stmt->fetchAll();
                return $result;
                }

    }

    