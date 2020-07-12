<?php
/**
 * Class RandomizeNumber
 */

class RandomizeNumber
{
    public static function randomize()
    {
        if (isset($_POST['submit'])){
            return rand(1,3);
        }
    }
}