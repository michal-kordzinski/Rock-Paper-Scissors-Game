<?php

/**
 * Class GameModel
 */
class GameModel
{
    /**
     * Saving results of game as table into table
     * $_SESSION['game_results'][$_SESSION['game_number']
     *
     * @param $computer_play
     * @param $user_play
     * @param $who_win
     *
     */

    public function saveResults($computer_play, $user_play, $who_win)
    {
        $this->saveGameNumber();
        $tab = array(
            "Computer play" =>$computer_play,
            "User play"     =>$user_play,
            "Who wins"      =>$who_win,
            "Date"          =>date('l jS \of F Y h:i:s A')
        );
        $_SESSION['game_results'][$_SESSION['game_number']] = [];
        array_push($_SESSION['game_results'][$_SESSION['game_number']] , $tab);
        //echo '<pre>' . print_r($_SESSION['game_results']) . '</pre>';
        //echo '<pre>' . var_dump($_SESSION['game_number']) . '</pre>';
    }
    public function getResults() :array
    {
        return $_SESSION['game_results'][$_SESSION['game_number']];
    }


    /**
     * Saving in $_SESSION['game_number'] game number. Ancillary function of saveResults function
     */
    private function saveGameNumber()
    {
        if (isset($_SESSION['game_number'])){
            $_SESSION['game_number'] += 1;
        } else {
            $_SESSION['game_number'] = 0;
        }
    }
}