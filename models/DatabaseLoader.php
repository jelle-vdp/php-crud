<?php
declare(strict_types=1);

// Looking for .env at the root directory
class DatabaseLoader
{
    private string $dbhost;
    private string $dbport;
    private string $dbname;
    private string $dbuser;
    private string $dbpass;
    private PDO $conn;

    public function __construct(){
        $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__), ".env");
        $dotenv->load();
        $this->dbhost = $_ENV['DATABASE_HOST'];
        $this->dbport = $_ENV['DATABASE_PORT'];
        $this->dbname = $_ENV['DATABASE_NAME'];
        $this->dbuser = $_ENV['DATABASE_USER'];
        $this->dbpass = $_ENV['DATABASE_PASSWORD'];
        $this->getConnection();
    }

    public function getConnection():PDO{
        try
        {
            $this->conn = new PDO('mysql:host=' . $this->dbhost . ':' . $this->dbport . ';dbname=' . $this->dbname, $this->dbuser, $this->dbpass);

            //uncomment echo to check if connection was established
//             echo "Connected to $this->dbname at $this->dbhost successfully.";

            return $this->conn;

        }

        catch
        (PDOException $pe) {
            die("Could not connect to the database $this->dbname :" . $pe->getMessage());
        }
    }

    public function getConn():PDO
    {
        return $this->conn;
    }

}