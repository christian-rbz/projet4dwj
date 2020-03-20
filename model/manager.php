<?php

class Manager
{
    
    protected function dbConnect() 
    {
        try
        {
            $this->db = new \PDO('mysql:host=localhost;dbname=projet4_mvc;charset=utf8', 'root', '', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
            return $this->db;
        }
        catch(Exception $e)
        {
            throw new Exception('Erreur : ' . $e->getMessage());
        }
    }
}