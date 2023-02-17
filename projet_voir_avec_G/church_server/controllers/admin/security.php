<?php

class Security
{
    public static function secureHTML($string)
    {
        //transform ou convertir caractère bizzare en  html 
        return htmlentities($string);
    }

    public static function verifAccessSession() 
    {
        return(!empty($_SESSION['access']) && $_SESSION['access'] === 'gestion');
    }
}