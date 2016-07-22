<?php

class Cell implements Observable
{
    const NULL_VALUE = 0;
    private $position;
    private $value;
    private $possibility;
    /**
     * @var Observer[]
     */
    private $observers;

    function __construct(Position $position, $content)
    {
        $this->observers = array();
        $this->position = $position;
        $this->value = $content;
        if ($this->isFilled())
            $this->possibility = new Possibility();
        else
            $this->possibility = new Possibility([1,2,3,4,5,6,7,8,9]);
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
        $this->possibility = new Possibility();
        $this->notifyObservers();
    }

    public function isEmpty()
    {
        return $this->getValue() == $this::NULL_VALUE;
    }

    public function isFilled()
    {
        return $this->getValue() != $this::NULL_VALUE;
    }

    public function getPossibility()
    {
        return $this->possibility;
    }

    public function setValueIfUnique()
    {
        if ($this->possibility->isUnique()) {
            $this->setValue($this->possibility->getPossibility(0));
            $this->getPossibility()->removePossibility($this->value);
            return true;
        }
        return false;
    }

    function addObserver(Observer &$observer)
    {
        array_push($this->observers, $observer);
    }

    function removeObserver(Observer &$observer)
    {
        for ($i = 0; $i < count($this->observers); $i++){
            if ($this->observers[$i] == $observer) {
                array_splice($this->observers, $i, 1);
            }
        }
    }

    function notifyObservers()
    {
        foreach ($this->observers as $o)
            $o->update($this);
    }

}