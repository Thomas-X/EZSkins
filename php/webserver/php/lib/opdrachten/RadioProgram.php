<?php
class RadioProgram {

    protected $programName;
    protected $descriptionName;
    protected $song;

    /**
     * @param $programName
     */
    function setProgramName($programName) {
        $this->programName = $programName;
    }

    /**
     * @return mixed
     */
    function getProgramName() {
        return $this->programName;
    }

    /**
     * @param $description
     */
    function setDescription($description) {
        $this->descriptionName = $description;
    }

    /**
     * @return mixed
     */
    function getDescription() {
        return $this->descriptionName;
    }



    function setSong($song) {


        array_push($array, $song);
        $this->array = $array;
        var_dump($array);
    }

    /**
     *
     */
    function getSongs() { //no : array :( stupid php 5.4


        foreach($array as $x) {
            echo "Song: " + $x;
        }
        var_dump($array);

    }


}