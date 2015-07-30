<?php

/**
 ****************************************************
 * sql.class.php                                    *
 ****************************************************
 * Angora Guestbook                                 *
 ****************************************************
 * Software author :            Adel Noureddine     *
 * Copyright 2005 - 2009 by :   Adel Noureddine     *
 ****************************************************
 * The SQL interface file                           *
 ****************************************************
 * */

interface SQL {
	
	/**	
	* The class constructor 
	* */
	public function __construct();
	
	/**	
	* The class destructor 
	* */
	public function __destruct();
	
	/**	
	* Set the connection data 
	* */
	public function setCon($datahost, $username, $userpass, $database);

	/**	
	* Connect to the database
	* */
	public function connect();
	
	/**	
	* Close the sql connection
	* */
	public function close();
	
	/**	
	* Get rows result for the sql query
	* @return TRUE if the query has been correctly executed
	* 		  FALSE if not
	* Results are stored in the $queryResult array
	* */
	public function getRows($queryData);
	
	/**	
	* Return the number of rows of the query previously executed
	* */
	public function getNumRows();
	
	/**	
	* Same as getRows, but does not store any results in $queryResult
	* This function should be used for INSERT, UPDATE and DELETE sql statements
	* */
	public function modify($queryData);
	
	/**	
	* Print the SQL error
	* */
	public function printError();
	
	/**	
	* Return the SQL version
	* */
	public function getVersion();
	
	/**
	 * Return number of all queries
	 */
	public function getNumQueries();
	
	/**
	 * Return all queries
	 */
	public function getQueriesDebug();

}

?>