<?php

    class users extends Dbh {
        public function addUser($u_scholar_id,$full_name,$username,$phone,$email,$password,$role) {
            $password = md5($password);
            $sql = "INSERT INTO user(scholar_id,u_fullname,u_username,u_phone,u_email,password,role,date) values (?,?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            return $stmt->execute([$u_scholar_id,$full_name,$username,$phone,$email,$password,$role,date('D M Y')]);
           /// return $stmt;
        }
        

        public function getUsers() {
            $sql = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getUsersProfile($id) {
            $sql = "SELECT * FROM user WHERE u_id = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            while($result = $stmt->fetchAll()){
                return $result;
            }
        }

        public function getTotalUsers() {
            $sql = "SELECT count(*) as total FROM users";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $result =  $stmt->fetchAll();
            return $result;
            }
        

    }

    