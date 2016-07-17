<?php

class QuadrantBottomRight implements Quadrant
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
        return 7;
    }

    function getLimitBottom():int
    {
        return 9;
    }
}