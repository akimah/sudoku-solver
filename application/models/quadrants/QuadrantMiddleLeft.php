<?php

class QuadrantMiddleLeft implements Quadrant
{
    function getLimitLeft():int
    {
        return 1;
    }

    function getLimitRight():int
    {
        return 3;
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