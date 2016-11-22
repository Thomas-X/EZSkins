<?php

class RadioProgram
{

    private $naam = "";
    private $omschrijving = "";
    private $liedjes = array();

    public function addSong($song) {
        $this->liedjes[] = $song;
    }
    public function getSongs() {
        return $this->liedjes;
    }

    /**
     * @return array
     */
    function getProgramma()
    {
        return array("naam" => $this->naam,
            "omschrijving" => $this->omschrijving);
    }

    /**
     * @param $naamparam
     * @internal param $naam
     */
    function setNaam($naamparam)
    {
        $this->naam = $naamparam;
    }

    function getNaam()
    {
        return $this->naam;
    }

    /**
     * @param $omschrijvingparam
     * @internal param $omschrijving
     */
    function setOmschrijving($omschrijvingparam)
    {
        $this->omschrijving = $omschrijvingparam;
    }

    function getOmschrijving()
    {
        return $this->omschrijving;
        }

}