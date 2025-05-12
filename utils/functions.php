<?php
include ("env.php");

function nettoyage($data)
{
    return htmlentities(strip_tags(stripslashes(trim($data))));
};

function env(string $key, $default = null)
{
    return $_ENV[$key] ?? $default;
}

function DBconnect()
{
    try {
        $bdd = new PDO(
            "mysql:host=" . env('dbhost') . ";dbname=" . env('dbname') . ";charset=utf8mb4",
            env('dblogin'),
            env('dbpassword'),
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
        return $bdd;
    } catch (PDOException $e) {
        die("Erreur de connexion : " . $e->getMessage());
    }
}
