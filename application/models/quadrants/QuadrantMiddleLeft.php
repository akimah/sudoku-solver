<?php

class QuadrantMiddleLeft implements Quadrant
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
        return 4;
    }

    function getLimitBottom()
    {
        return 6;
    }
}