<?php

    class upload extends Dbh {
        public function uploadAudio($file_id,$u_id,$audio_name,$size) {
            $sql = "INSERT INTO audio(file_id,u_id,audio_name,size) values (?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$file_id,$u_id,$audio_name,$size]);
           /// return $stmt;
        }
        
    
        

    }

    