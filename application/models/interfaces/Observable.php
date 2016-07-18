<?php

interface Observable
{
    function addObserver(Observer &$observer);
    function removeObserver(Observer &$observer);
    function notifyObservers();
}