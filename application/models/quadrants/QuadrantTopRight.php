<?php

class QuadrantTopRight implements Quadrant
{
    function getLimitLeft()
    {
        return 7;
    }

    function getLimitRight()
    {
        return 9;
    }

    function getLimitTop()
    {
        return 1;
    }

    function getLimitBottom()
    {
        return 3;
    }
}