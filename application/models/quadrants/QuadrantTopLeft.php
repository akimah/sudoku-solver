<?php

class QuadrantTopLeft implements Quadrant
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
        return 1;
    }

    function getLimitBottom()
    {
        return 3;
    }
}