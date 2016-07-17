<?php

class QuadrantTopLeft implements Quadrant
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
        return 1;
    }

    function getLimitBottom():int
    {
        return 3;
    }
}