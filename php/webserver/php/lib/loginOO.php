<?php
class Login
{


    private $escaped1;
    private $escaped2;

    private $password = "";
    private $username = "";

    private $userusernameinput;
    private $userpasswordinput;

    private $input;

    private $validEntry;

    /**
     * @setter sets escaped variables
     * @param $userusernameinput = input of user's username
     * @param $userpasswordoutput = input of user's password
     * @required connect function
     */
    function escapelogin($userusernameinput, $userpasswordinput)
    {

        //escapes username and password
        $this->escaped1 = new escapesqlchars($userusernameinput);
        $this->escaped2 = new escapesqlchars($userpasswordinput);

        $this->username = new escapehtmlchars($this->escaped1);
        $this->password = new escapehtmlchars($this->escaped2);
    }

    /**
     * @required escapelogin
     * @param $password = password to encrypt
     */

    function encryptpassword($password)
    {
        $this->password = md5($password);
    }

    /**
     * @required session_start();
     * @param $input = submit button value
     * @param $logindatatablename = logindata table name
     * @param $usernamecolumnname = columname of usernames
     * @param $passwordcolumnname = columnname of password
     * @param $usernamevariablename = name the $_SESSION['YOURNAMEHERE'] should be
     * @param $redirectafterlogin = redirect after login is successful
     * @return void..
     */
    function login($input, $logindatatablename, $usernamecolumnname, $passwordcolumnname, $usernamevariablename, $redirectafterlogin)
    {
        $this->validEntry = false;
        if (isset($input)) {
            $getUsers = new query("SELECT * FROM $logindatatablename WHERE $usernamecolumnname='$this->username' AND $passwordcolumnname='$this->password'");
            $getRows = new affectedRows();

            if ($getRows >= 1) {
                $this->validEntry = true;
            }
            if ($this->validEntry === true) {
                $_SESSION[$usernamevariablename] = $this->username;
                header("Location: $redirectafterlogin");
            } else {
                $message = "Invalid credentials!";
                return $message;
            }
        } else {
            $message = "Please log in";
            return $message;
        }

    }
}