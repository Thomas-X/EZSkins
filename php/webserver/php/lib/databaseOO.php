<?php
class Database {
	
	private $host;
	private $usernameDB;
	private $passwordDB;
	private $database;
	private $queryinput;
	private $connect;
	private $queryoutput;

	private $escapesqlinput;
	private $escapehtmlinput;
	private $escapesqloutput;
	private $escapehtmloutput;

	/**
	*	Connects to a MySQL database
	*	@return returns if connect was true of false
	*	@param $host = which IP or localhost to connect to
	*	@param $usernameDB = username of MySQL database
	*	@param $password = password of MySQL database
	*	@param $database = database to use
	*/
    public function connect($host,$usernameDB,$passwordDB,$database) {
    	$this->connect = mysqli_connect("$host", "$usernameDB", "$passwordDB", "$database");
    	return $connect;
    }

    /** 
    *	@return $queryoutput - returns output of query
    * 	@param $queryinput = query to be run
	*	@required connect function
    */
    public function query($queryinput) {
    	$connectlocal = $this->connect;
    	$this->queryoutput = mysqli_query($connect, "$queryinput");
    	return $queryoutput;
    }
	/**
	*	@return $escapesqloutput - returns the escaped character
	*	@param $escapesqlinput = thing to be escaped (MySQL)
	*	@required connect function
	*/	
    public function escapesqlchars($escapesqlinput) {
    	$connectlocal = $this->connect;
    	$this->escapesqloutput = mysqli_real_escape_string($connectlocal, $escapesqlinput);
    	return $escapesqloutput;
    }
    	/**
	*	@return $escapehtmloutput - returns the escaped character
	*	@param $escapehtmlinput = thing to be escaped (MySQL)
	*	@required connect function
	*/	
    public function escapehtmlchars($escapehtmlinput) {
    	$connectlocal = $this->connect;
    	$this->escapehtmloutput = mysqli_real_escape_string($connectlocal, $escapehtmlinput);
    	return $escapehtmloutput;
    }
}