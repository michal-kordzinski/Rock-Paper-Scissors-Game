<?php

//klasa łącząca się z baza danych
//metody poprzedzone '_' odwoluja sie tylko do bazy danych

/**
 * Class Database
 */
class Database
{
    /**
     * @var
     */
    private static $_instance;

    /**
     * @var string
     */
    private $_host = DB_HOST;
    /**
     * @var string
     */
    private $_username = DB_USER;
    /**
     * @var string
     */
    private	$_password = DB_PASS;
    /**
     * @var string
     */
    private	$_dbname = DB_NAME;
    /**
     * @var PDO
     */
    private $_pdo;
    /**
     * @var
     */
    private $_query;
    /**
     * @var
     */
    private $_results;
    /**
     * @var
     */
    private $_error;
    /**
     * @var string
     */
    private $_charset = DB_CHARSET;

    /**
     * Database constructor.
     */
    private function __construct()
    {

        $dsn = "mysql:host={$this->_host};dbname={$this->_dbname};charset={$this->_charset}";

        $options  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
            PDO::ATTR_PERSISTENT         => TRUE,
        );

        try {
			$this->_pdo = new PDO($dsn, $this->_username, $this->_password, $options);

		} catch(PDOException $error) {
			http_response_code(500);
		}
    }

    /**
     * return object Database
     * @return Database
     */
    public static function getInstance() {
        if (!isset(self::$_instance)) {
           self::$_instance = new Database();
       }		
       return self::$_instance;
    }
    //

    /**
     * @param       $query
     * @param array $params
     *
     * @return $this
     */
    public function query($query, $params = array()) {
		$this->_error = false;
		$this->_results = [];

		$stmt = $this->_pdo->prepare($query);

	    if (!$stmt->execute($params)) {
			$this->_error = true;
	    } else {
	    	$this->_results = $stmt->fetchAll();
        }
        
	    return $this;
    }

    /**
     * @return mixed
     */
    public function results() {
		return $this->_results;
    }

    /**
     * @return mixed
     */
    public function first() {
		return @$this->_results[0];
	}

    /**
     * @return mixed
     */
    public function error() {
		return $this->_error;
	}
}