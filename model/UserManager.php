<?php

class UserManager extends Manager
{
    public function verifyUser()
    {
        $req = $this->_db->prepare('SELECT * FROM user');
        $req->execute();
        $data = $req->fetch();
    
        return $data;
    }


    public function getConnect(User $profil)
    {
        $req = $this->_db->prepare('SELECT * FROM user WHERE email= :email');
        $req->execute(['email' => $profil->getEmail()]);
        $data = $req->fetch();
        
        if ($data) {
            return new User($data);    
        } else {
            return false;
        }
    }

}