<?php

class Position
{
    private $horizontal;
    private $vertical;

    function __construct($horizontal, $vertical)
    {
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }

    public function getHorizontal():int
    {
        return $this->horizontal;
    }

    public function getVertical ():int
    {
        return $this->vertical;
    }

    public function getQuadrant():Quadrant
    {
        if ($this->vertical <= 3) {
            if ($this->horizontal <= 3)
                return QuadrantFactory::createQuadrantTopLeft();
            if ($this->horizontal >= 7)
                return QuadrantFactory::createQuadrantTopRight();
            if ($this->horizontal < 7 && $this->horizontal > 3)
                return QuadrantFactory::createQuadrantTopCenter();
        }
        if ($this->vertical >= 7) {
            if ($this->horizontal <= 3)
                return QuadrantFactory::createQuadrantBottomLeft();
            if ($this->horizontal >= 7)
                return QuadrantFactory::createQuadrantBottomRight();
            if ($this->horizontal < 7 && $this->horizontal > 3)
                return QuadrantFactory::createQuadrantBottomCenter();
        }
        if ($this->vertical > 3 && $this->vertical < 7) {
            if ($this->horizontal <= 3)
                return QuadrantFactory::createQuadrantMiddleLeft();
            if ($this->horizontal >= 7)
                return QuadrantFactory::createQuadrantMiddleRight();
            if ($this->horizontal < 7 && $this->horizontal > 3)
                return QuadrantFactory::createQuadrantMiddleCenter();
        }
    }
}