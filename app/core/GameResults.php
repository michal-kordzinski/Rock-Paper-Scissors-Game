<?php


class GameResults
{

    public static function whoWin($computer_play, $user_play)
    {
        if (self::isComputerWin($computer_play, $user_play)) return "Computer wins!";
        else return "You win!";
    }
    /**
     * @param $computer_play
     * @param $user_play
     * Function compares results of game. It takes two params: int or string and
     * return true if computer wins and false if not
     * @return bool
     */
    private static function isComputerWin($computer_play, $user_play)
    {
        if (is_string($computer_play)){
            $computer_play = self::ResultConversion($computer_play);
        }
        if (is_string($user_play)){
            $user_play = self::ResultConversion($user_play);
        }
        if ($computer_play == 1 && $user_play == 3 ||
            $computer_play == 2 && $user_play == 1 ||
            $computer_play == 3 && $user_play == 2){
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $result
     * Converting string to int or int to string. Rock will be converting
     * to 1, Paper to 2 and Scissors to 3 and vice versa.
     * @return int|string
     */
    public static function ResultConversion($result)
    {
        if (is_int($result)){
            switch ($result){
                case 1:
                    return "Rock";
                    break;
                case 2:
                    return "Paper";
                    break;
                case 3:
                    return "Scissors";
                    break;
            }
        } else{
            switch ($result){
                case "Rock":
                    return 1;
                    break;
                case "Paper":
                    return 2;
                    break;
                case "Scissors":
                    return 3;
                    break;
            }
        }
    }
}