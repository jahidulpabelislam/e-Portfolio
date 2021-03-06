<?php
/**
 * Connects to a database and set up to send and receive data
 * using application constants defined in connection.php file
 * a reusable file for other projects
 * MySQL specific
 * @author 733474
*/

class pdodb
{
    private $db;

    /**
     * Connects to a MySQL engine
     * using application constants IP, USERNAME, and PASSWORD
     * defined in connection.php.
     *
     * If the database with name of constant DATABASENAME doesn't exist,
     * it is created using using the constant DATABASENAME and table/s are created using
     * constant CREATEQUERY
     */
    public function __construct()
    {
    	if (defined("DB_IP") && defined("DB_NAME") && defined("DB_USERNAME") && defined("DB_PASSWORD"))
	    {
		    $dsn = "mysql:host=" . DB_IP . ";dbname=" . DB_NAME . ";charset-UTF-8";
		    $option = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
		    try {
			    $this->db = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $option);
		    } catch (PDOException $failure) {
			    error_log("Database connection failed for Lials: " . $failure->getMessage());
			    if (defined("DEBUG") && DEBUG) {
				    echo "Database connection failed for lials: " . $failure->getMessage();
			    }
		    }
	    }
	    else
	    {
		    error_log("Database connection failed for Lials.");
		    echo "A internal problem has occurred, please get in touch or try again later!";
		    die();
	    }
     
    }

    /**
     * Executes a sql query
     * @param $query string the sql query to run
     * @param null $bindings array array of any bindings to do with sql query
     * @return array array of data
     */
    public function query($query, $bindings = null)
    {
        try {
            //check if any bindings to execute
            if (isset($bindings)) {
                $result = $this->db->prepare($query);
                $result->execute($bindings);
            } else {
                $result = $this->db->query($query);
            }

            //if query was a select, return array of data
            if (strpos($query, "SELECT") !== false) {
                $results["rows"] = $result->fetchAll(PDO::FETCH_ASSOC);
            }
            $results["count"] = $result->rowCount();
        } catch (PDOException $failure) {
            $results["meta"]["ok"] = false;
            $results["meta"]["feedback"] = "Problem with Server.";
	        error_log("Database exception  for lials:" . $failure->getMessage());
	        
	        if (defined("DEBUG") && DEBUG) {
		        $results["meta"]["exception"] = $failure->getMessage();
		        $results["meta"]['bindings'] = $bindings;
		        $results["meta"]['query'] = $query;
	        }
        }
        return $results;
    }

    /**
     * @return int id of last inserted row of data
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();
    }
}		