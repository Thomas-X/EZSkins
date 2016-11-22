<?php

class Liedje
{
    private $titel;
    private $artiest;

    public function __construct($titel, $artiest)
{
    $this->titel = $titel;
    $this->artiest = $artiest;
}

    /**
     * @return mixed
     */
    public function getTitel()
    {
        return $this->titel;
    }

    /**
     * @param mixed $titel
     */
    public function setTitel($titel)
    {
        $this->titel = $titel;
    }

    /**
     * @return mixed
     */
    public function getArtiest()
    {
        return $this->artiest;
    }

    /**
     * @param mixed $artiest
     */
    public function setArtiest($artiest)
    {
        $this->artiest = $artiest;
    }
}