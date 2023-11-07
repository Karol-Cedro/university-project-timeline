<?php

require_once$_SERVER['DOCUMENT_ROOT'].'/timeline/config/config.php';
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbHandler;
    private $error;
    private $statement;

    public function __construct()
    {
        //Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        //Ser Options
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //PDO Instance
        try {
            $this->dbHandler = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->statement = $this->dbHandler->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    public function resultsSet()
    {
        $this->execute();
        return $this->statement->fetchALL(PDO::FETCH_OBJ);
    }

    public function execute()
    {
        return $this->statement->execute();
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }
}
