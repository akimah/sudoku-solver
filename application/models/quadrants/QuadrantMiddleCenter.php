<?php

class QuadrantMiddleCenter implements Quadrant
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
        return 4;
    }

    function getLimitBottom()
    {
        return 6;
    }
}