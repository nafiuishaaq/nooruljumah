<?php

session_start();

    class login extends Dbh {
        public function loginUser($email,$pass) {
            $pass = md5($pass);
            $sql = "SELECT * FROM user WHERE u_email = ? and password = ? LIMIT 1";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $pass]);

            $result = $stmt->fetch();
            if($result != null){
                $_SESSION['u_email'] = $email;
                $_SESSION['u_id'] = $result['u_id'];
                $_SESSION['role'] = $result['role'];
                return true;
            }else{
                return false;
            }
           
             
            //;
/*
            if (null === ($stmt->fetch()))
            {
                return true;
            }

                return false;
            
            */
    }

    

}