<?php

class QuadrantMiddleCenter implements Quadrant
{
    function getLimitLeft():int
    {
        return 4;
    }

    function getLimitRight():int
    {
        return 6;
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