<?php

/**
 ****************************************************
 * mysqli.class.php                                 *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The MySQLi class file                            *
 ****************************************************
 * */

class AngoraMySQLi implements SQL {
	
	private $datahost;
	private $username;
	private $userpass;
	private $database;
	private $connection;
	private $query;
	private $numRows;	
	public $queryResult = array();
	
	private $numQueries;
	private $queriesDebug = array();
	
	/**	
	* The class constructor 
	* */
	function __construct() {}
	
	/**	
	* The class destructor 
	* */
	function __destruct() {
		unset($this->datahost);
		unset($this->username);
		unset($this->userpass);
		unset($this->database);
		unset($this->queryResult);
		unset($this->numQueries);
	}
	
	/**	
	* Set the connection data 
	* */
	function setCon($datahost, $username, $userpass, $database) {
		$this->datahost = $datahost;
		$this->username = $username;
		$this->userpass = $userpass;
		$this->database = $database;
		$this->numQueries = 0;
		$this->queryResult = array();
	}
	
	/**	
	* Connect to the database
	* */
	function connect() {
		$this->connection = @mysqli_connect($this->datahost, $this->username, $this->userpass, $this->database, 3306);
		if (! $this->connection)
			die('Connection error! ' . mysqli_connect_error());
	}
	
	/**	
	* Close the sql connection
	* */
	function close() {
		$this->numRows = NULL;
		@mysqli_close($this->connection);
	}
	
	/**	
	* Get rows result for the sql query
	* @return TRUE if the query has been correctly executed
	* 		  FALSE if not
	* Results are stored in the $queryResult array
	* */
	function getRows($queryData) {
		$this->numQueries++;
		$this->queriesDebug[] = $queryData;
		
		$this->queryResult = array();
		$this->query = @mysqli_query($this->connection, $queryData);
		if ($this->query) {
			$i = 0;
			while (($row = @mysqli_fetch_assoc($this->query))) {
				$this->queryResult[$i] = $row;
				$i++;
			}
			$this->numRows = @mysqli_affected_rows($this->connection);
			@mysqli_free_result($this->query);
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	
	/**	
	* Return the number of rows of the query previously executed
	* */
	function getNumRows() {
		return $this->numRows;
	}
	
	/**	
	* Same as getRows, but does not store any results in $queryResult
	* This function should be used for INSERT, UPDATE and DELETE sql statements
	* */
	function modify($queryData) {
		$this->numQueries++;
		$this->queriesDebug[] = $queryData;
		
		$this->query = @mysqli_query($this->connection, $queryData);
		if ($this->query)
			return TRUE;
		else
			return FALSE;
	}
	
	/**	
	* Print the SQL error
	* */
	function printError() {
		echo @mysqli_error($this->connection);
	}
	
	/**	
	* Return the MySQL version
	* */
	function getVersion() {
		return @mysqli_get_server_info($this->connection);
	}
	
	/**
	 * Return number of all queries
	 */
	function getNumQueries() {
		return $this->numQueries;
	}
	
	/**
	 * Return all queries
	 */
	function getQueriesDebug() {
		return $this->queriesDebug;
	}

	function real_escape_string($string) {
		return mysqli_real_escape_string($this->connection, $string);
	}
	
	
}

?>
