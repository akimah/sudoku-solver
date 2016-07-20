<?php


class QuadrantBottomLeft implements Quadrant
{
    function getLimitLeft()
    {
        return 1;
    }

    function getLimitRight()
    {
        return 3;
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