<?php

class Shinkansen
{
    public $series;
    public $introduced;
    public $maxSpeedMPH;
    public $maxSpeedKMH;
    public $maxSpeed;
    public $withdrawn;
    public $withdrawnYr;
    public $withdrawnOutput;
    public $url;

    public function __construct(string $series, int $introYR, int $maxSpeedKMH, int $maxSpeedMPH, int $withdrawn, string $url, int $withdrawnYr)
    {
        $this->series = $series;
        $this->introduced = $introYR;
        $this->maxSpeedKMH = $maxSpeedKMH;
        $this->maxSpeedMPH = $maxSpeedMPH;
        $this->withdrawn = $withdrawn;
        $this->url = $url;
        $this->withdrawnYr = $withdrawnYr;
        $this->maxSpeed = $this->maxSpeedKMH . 'km/h (' . $this->maxSpeedMPH . 'mph)';
        $this->withdrawnOutput = $this->withdrawn===1 ? $this->withdrawnYr : 'still in service';
    }
}