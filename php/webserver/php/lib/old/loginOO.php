<?php

class Login
{


    private $escaped1;
    private $escaped2;
    private $password;
    private $username;
    private $validEntry;

    /**
     * @setter sets escaped variables
     * @param $userusernameinput = input of user's username
     * @param $userpasswordinput
     * @internal param $userpasswordoutput = input of user's password
     * @required connect function
     */
    function escapelogin($userusernameinput = '', $userpasswordinput = '')
    {
        //init functions
        $databaseOO = new Database();
        //escapes username and password
        $this->escaped1 = $databaseOO->escapesqlchars($userusernameinput);
        $this->escaped2 = $databaseOO->escapesqlchars($userpasswordinput);

        $this->username = $databaseOO->escapehtmlchars($this->escaped1);
        $this->password = $databaseOO->escapehtmlchars($this->escaped2);
    }

    /**
     * @required escapelogin
     * @param $password = password to encrypt
     */
    function encryptpassword($password = '')
    {
        $this->password = md5($password);
    }
}