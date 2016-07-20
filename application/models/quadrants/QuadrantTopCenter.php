<?php

class QuadrantTopCenter implements Quadrant
{
    function getLimitLeft()
    {
        return 4;
    }

    function getLimitRight()
    {
        return 6;
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