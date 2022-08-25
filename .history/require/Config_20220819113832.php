<?php

namespace App;

use PDO;
use Symfony\Component\Dotenv\Dotenv;

class Config
{

    private static $envLoaded = false;

    /**
     * Charge les variables d'environnement depuis le .env
     */
    private static function loadEnv()
    {
        if (self::$envLoaded) {
            return;
        }
        $dotenv = new Dotenv();
        $dotenv->load(dirname(__DIR__) . '/.env');
        self::$envLoaded = true;
    }

    /**
     * Renvoie une instance de PDO en se basant sur l'environnement
     * @return PDO
     */
    public static function getPDO()
    {
        self::loadEnv();
        $pdo = new PDO("mysql:dbname=" . getenv('DB_NAME') . ";host=" . getenv('DB_HOST'), getenv('DB_USERNAME'),
            getenv('DB_PASSWORD'), [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        return $pdo;
    }

}
