<?php

class QuadrantMiddleRight implements Quadrant
{
    function getLimitLeft():int
    {
        return 7;
    }

    function getLimitRight():int
    {
        return 9;
    }

    function getLimitTop():int
    {
        return 4;
    }

    function getLimitBottom():int
    {
        return 6;
    }
}