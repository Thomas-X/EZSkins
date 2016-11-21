<?php
//
///**
// * @property mysqli connect
// */
//class Database {
//
//    public $queryoutput;
//    public $escapesqloutput;
//    public $escapehtmloutput;
//    public $getRows;
//    public $connect;
//    /** @noinspection PhpUndefinedClassInspection */
//
//    /**
//     *    Connects to a MySQL database
//     *
//     * @param $host = which IP or localhost to connect to
//     * @param $usernameDB = username of MySQL database
//     * @param $passwordDB
//     * @param $database = database to use
//     * @return mysqli
//     * @internal param $password = password of MySQL database
//     */
//    public function connectfunc($host,$usernameDB,$passwordDB,$database) {
//
//        $connect = mysqli_connect([$host, [$usernameDB, [$passwordDB, [$database]]]]);
//        return $connect;
//
////        $this->connect = mysqli_connect("$host", "$usernameDB", "$passwordDB", "$database");
////        return $this->connect;
//    }
//    /**
//     *
//     * @param $queryinput = query to be run
//     * @param $returnofconnect
//     * @return bool|mysqli_result $queryoutput - returns output of query
//     * @internal param mysqli $connect
//     * @internal param mysqli $connect
//     * @required connect function
//     */
//    public function query($queryinput, $returnofconnect) {
//        $this->queryoutput = mysqli_query($returnofconnect, "$queryinput");
//    	return $this->queryoutput;
//    }
//
//    /**
//     *
//     * @param $escapesqlinput = thing to be escaped (MySQL)
//     * @param $returnofconnect
//     * @return string $escapesqloutput - returns the escaped character
//     * @internal param mysqli $connect
//     * @required connect function
//     */
//    public function escapesqlchars($escapesqlinput, $returnofconnect) {
//    	$this->escapesqloutput = mysqli_real_escape_string($returnofconnect, $escapesqlinput);
//    	return $this->escapesqloutput;
//    }
//
//    /**
//     *
//     * @param $escapehtmlinput = thing to be escaped (MySQL)
//     * @return string $escapehtmloutput - returns the escaped character
//     * @required connect function
//     */
//    public function escapehtmlchars($escapehtmlinput) {
//    	$this->escapehtmloutput = htmlspecialchars($escapehtmlinput);
//    	return $this->escapehtmloutput;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function affectedRows() {
//        $this->getRows = mysqli_affected_rows($this->connect);
//        return $this->getRows;
//    }
//
//}