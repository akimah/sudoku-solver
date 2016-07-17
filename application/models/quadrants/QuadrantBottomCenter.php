<?php

class QuadrantBottomCenter implements Quadrant
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
        return 7;
    }

    function getLimitBottom():int
    {
        return 9;
    }
}