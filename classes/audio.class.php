<?php

    class audio extends Dbh {
        public function addAudio($file_id,$fileName,$fileSize) {
            $sql = "INSERT INTO audio(file_id,audio_name,size,date) values (?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$file_id,$fileName,$fileSize,date('D M Y')]);
           /// return $stmt;
        }
        

        public function getAudio() {
            $sql = "SELECT * FROM `audio` ORDER BY `audio_id` DESC LIMIT 8";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getAllAudio($id) {
            $sql = "SELECT * FROM `audio` WHERE `file_id` = '$id'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getTotalAudio() {
            $sql = "SELECT count(*) as total FROM audio";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            return $result;
            }
        

    }

    