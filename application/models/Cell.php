<?php

class Cell
{
    private $position;
    private $value;
    private $possibility;

    function __construct(Position $position, $content)
    {
        $this->position = $position;
        $this->value = $content;
        $this->possibility = new Possibility();
    }

    /**
     * @return Position
     */
    public function getPosition(): Position
    {
        return $this->position;
    }

    /**
     * @param Position $position
     */
    public function setPosition(Position $position)
    {
        $this->position = $position;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isEmpty():bool
    {
        return $this->getValue() == 0;
    }

    /**
     * @return bool
     */
    public function isFilled():bool
    {
        return $this->getValue() != 0;
    }

    /**
     * @return Possibility
     */
    public function getPossibility(): Possibility
    {
        return $this->possibility;
    }

    public function setValueIfUnique()
    {
        if ($this->possibility->isUnique()) {
            $this->value = $this->possibility->getPossibility(0);
        }
    }

}