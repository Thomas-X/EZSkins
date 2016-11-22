<?php
class ReadMonkey {

    public $monkeyFiledir;
    public $monkeyFile;

    /**
     * ReadMonkey constructor.
     */
    function __construct()
    {
    }

    /**
     * @param $filedir
     */
    function setfileDir($filedir){
        $this->monkeyFiledir = $filedir;
    }

    /**
     * @return string
     */
    function getfile() {
        $handle = fopen($this->monkeyFiledir, "r");
        $this->monkeyFile = fread($handle, filesize($this->monkeyFiledir));
        return $this->monkeyFile;
    }
    function redirect() {
        $monkeysearch = explode(PHP_EOL, $this->monkeyFile);
        var_dump($monkeysearch);
        $counter = 0;
        foreach($monkeysearch as $x) {
            $search = $monkeysearch[$counter];
            echo "<br><a href='http://www.google.com/search?site=imghp&tbm=isch&q=" . urlencode($search) . "'>" . $search . "</a>";
            $counter++;
        }
    }
}