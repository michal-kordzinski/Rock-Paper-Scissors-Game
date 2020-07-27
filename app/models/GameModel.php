<?php

/**
 * Class GameModel
 */
class GameModel
{
    private $computer_play;

    private $user_play;

    private $game_results;
    /**
     * @param mixed $computer_play
     */
    public function setComputerPlay($computer_play)
    {
        $this->computer_play = $computer_play;
    }


    /**
     * @return mixed
     */
    public function getUserPlay()
    {
        return $this->user_play;
    }

    /**
     * @param mixed
     *
     * @return GameModel
     */
    public function setUserPlay()
    {
        $this->user_play = $_POST['submit'];
        return $this;
    }

    /**
     * @return mixed
     */
    public function getComputerPlay()
    {
        return $this->computer_play;
    }


    /**
     * Method saving the results of the game in $_SESSION['game_results'] as arrays.
     * Every array is one game. Index of array is a number of game.
     *
     * @return void
     */
    public function saveResults() :void
    {

        $tab = array(
            "Computer play" =>$this->computer_play,
            "User play"     =>$this->user_play,
            "Who wins"      =>GameResults::whoWin($this->computer_play, $this->user_play),
            "Date"          =>date('D jS \of F G:i:s')
        );
        if (!isset($_SESSION['game_results'])) $_SESSION['game_results'] = [];
        array_push($_SESSION['game_results'] , $tab);

    }


    /**
     * Getter of game of result. Default returns array who contains arrays.
     * Every array is one game. Index of an array is a number of game.
     * Can be specified options of getters via params.
     *
     * @param bool $number_of_game Optional: Takes the number of game
     *
     * @param bool $key_of_element Optional: Takes the key of element
     * @param bool $last_game Optional: Set true if u want get results of last game
     *
     * @return array|string
     */
    public function getGameResults($number_of_game = false, $key_of_element = false, $last_game = false)
    {
        if ($key_of_element != false && $last_game = true) {
            return $_SESSION['game_results'][array_key_last($_SESSION['game_results'])][$key_of_element];
        }
        elseif ($number_of_game != false && $key_of_element != false && $last_game == false){
            return $_SESSION['game_results'][$number_of_game][$key_of_element];
        }
        elseif ($number_of_game != false && $key_of_element == false && $last_game == false){
            return $_SESSION['game_results'][$number_of_game];
        }
        else {
            if (isset($_SESSION['game_results'])) return $_SESSION['game_results'];
        }
    }

}