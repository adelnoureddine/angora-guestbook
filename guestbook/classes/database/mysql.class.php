<?php

/**
 ****************************************************
 * mysql.class.php                                  *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The MySQL class file                             *
 ****************************************************
 * */

class AngoraMySQL implements SQL {
	
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
		$this->connection = @mysql_connect($this->datahost, $this->username, $this->userpass);
		@mysql_select_db($this->database);
	}
	
	/**	
	* Close the sql connection
	* */
	function close() {
		$this->numRows = NULL;
		@mysql_close($this->connection);
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
		$this->query = @mysql_query($queryData);
		if ($this->query) {
			$i = 0;
			while (($row = @mysql_fetch_array($this->query, MYSQL_ASSOC))) {
				$this->queryResult[$i] = $row;
				$i++;
			}
			$this->numRows = @mysql_num_rows($this->query);
			@mysql_free_result($this->query);
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
		
		$this->query = @mysql_query($queryData);
		if ($this->query)
			return TRUE;
		else
			return FALSE;
	}
	
	/**	
	* Print the SQL error
	* */
	function printError() {
		echo @mysql_error();
	}
	
	/**	
	* Return the MySQL version
	* */
	function getVersion() {
		return @mysql_get_server_info();
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
	
}

?>