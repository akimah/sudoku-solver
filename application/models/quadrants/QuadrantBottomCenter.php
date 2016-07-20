<?php

class QuadrantBottomCenter implements Quadrant
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
        return 7;
    }

    function getLimitBottom()
    {
        return 9;
    }
}