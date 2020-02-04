<?php

class Shinkansen
{
    public $series;
    public $maxSpeedMPH;
    public $maxSpeedKMH;
    public $maxSpeed;
    public $withdrawn;
    public $withdrawnYr;
    public $withdrawnOutput;
    public $url;

    public function __construct($series, $maxSpeedKMH, $maxSpeedMPH, $withdrawn, $url, $withdrawnYr)
    {
        $this->series = $series;
        $this->maxSpeedKMH = $maxSpeedKMH;
        $this->maxSpeedMPH = $maxSpeedMPH;
        $this->withdrawn = $withdrawn;
        $this->url = $url;
        $this->withdrawnYr = $withdrawnYr;
        $this->maxSpeed = $this->maxSpeedKMH . 'km/h (' . $this->maxSpeedMPH . 'mph`)';
        $this->withdrawnOutput = $this->withdrawn===1 ? $this->withdrawnYr : 'still in service';
    }
}