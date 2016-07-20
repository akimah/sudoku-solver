<?php

class QuadrantFactory
{

    const Q_BOTTOM_CENTER = "qbc";
    const Q_BOTTOM_LEFT = "qbl";
    const Q_BOTTOM_RIGHT = "qbr";
    const Q_MIDDLE_CENTER = "qmc";
    const Q_MIDDLE_LEFT = "qml";
    const Q_MIDDLE_RIGHT = "qmr";
    const Q_TOP_CENTER = "qtc";
    const Q_TOP_LEFT = "qtl";
    const Q_TOP_RIGHT = "qtr";

    static function getQuadrant($quadrant) {
        switch ($quadrant) {
            case self::Q_BOTTOM_CENTER: return new QuadrantBottomCenter();
            case self::Q_BOTTOM_LEFT: return new QuadrantBottomLeft();
            case self::Q_BOTTOM_RIGHT: return new QuadrantBottomRight();
            case self::Q_MIDDLE_CENTER: return new QuadrantMiddleCenter();
            case self::Q_MIDDLE_LEFT: return new QuadrantMiddleLeft();
            case self::Q_MIDDLE_RIGHT: return new QuadrantMiddleRight();
            case self::Q_TOP_CENTER: return new QuadrantTopCenter();
            case self::Q_TOP_LEFT: return new QuadrantTopLeft();
            case self::Q_TOP_RIGHT: return new QuadrantTopRight();
        }
        return null;
    }

    static function createQuadrantBottomCenter()
    {
        return new QuadrantBottomCenter();
    }

    static function createQuadrantBottomLeft()
    {
        return new QuadrantBottomLeft();
    }

    static function createQuadrantBottomRight()
    {
        return new QuadrantBottomRight();
    }

    static function createQuadrantMiddleCenter()
    {
        return new QuadrantMiddleCenter();
    }

    static function createQuadrantMiddleLeft()
    {
        return new QuadrantMiddleLeft();
    }

    static function createQuadrantMiddleRight()
    {
        return new QuadrantMiddleRight();
    }

    static function createQuadrantTopCenter()
    {
        return new QuadrantTopCenter();
    }

    static function createQuadrantTopLeft()
    {
        return new QuadrantTopLeft();
    }

    static function createQuadrantTopRight()
    {
        return new QuadrantTopRight();
    }
}