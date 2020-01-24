<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=siges_db', 'drigos1er', 'Drig@s1er');
}catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
