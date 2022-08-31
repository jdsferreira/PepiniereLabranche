<?php

class Manager
{
    public function connexionBD()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=evaluationfinale;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}