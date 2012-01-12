<?php
class Database {
    private static $db = null;

    public static function connect() {
        if ($db != null) {
            return $db;
        }

        $config = json_decode(file_get_contents(Config::path()));
        $db = mysql_connect($config->mysql->host, 
                            $config->mysql->username,
                            $config->mysql->password)
            or die( "Error: " . mysql_error() );
        mysql_select_db($config->mysql->database);

        return $db;
    }
}

class Env {
    const PROD = 0;
    const STAGE = 1;
    const DEV = 2;

    public function get() {
        switch ($_SERVER['ENV']) {
        case "prod":
            return 0;
        case "stage":
            return 1;
        case "dev":
            return 2;
        }
        return -1;
    }
}

class Config {
    public function path() {
        switch (Env::get()) {
        case Env::PROD:
            return "includes/config.json";
        case Env::STAGE:
            return "includes/config.stage.json";
        case Env::DEV:
            return "includes/config.dev.json";
        }
        return "";
    }

    public function appId() {
        $config = json_decode(file_get_contents(self::path()));
        return $config->app->appId;
    }
    public function secret() {
        $config = json_decode(file_get_contents(self::path()));
        return $config->app->secret;
    }
}
