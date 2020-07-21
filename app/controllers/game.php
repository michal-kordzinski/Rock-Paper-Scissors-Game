<?php

/**
 * Class Home
 */
class Game extends Controller
{
    /**
     * @var array
     */
    private $game_result;

    /**
     * @param $number_of_game array number of game
     * @param $key_of_value array deliver one of the keys:
     *                            "Compuer play" - return string
     *                            "User play" - return string
     *                            "Who wins" - return string
     *                            "Date"- return date
     *
     * @return mixed
     */
    public function getGameResult($number_of_game, $key_of_value)
    {
        return $this->game_result[$number_of_game][$key_of_value];
    }

    /**
     * @param mixed $game_result
     */
    public function setGameResult($game_result)
    {
        $this->game_result = $game_result;
    }
    /**
     * Game constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel("GameModel");
    }
    /**
     * @param string
     */
    public function index($param = '')
    {

        $this->getView('game');
    }

    /**
     * @param $model
     */
    public function play()
    {
        $this->model = $this->getModel('GameModel');
        $computer_play = GameResults::ResultConversion(RandomizeNumber::randomize()); //string
        $user_play = $_POST['submit']; //string
        $this->model->saveResults($computer_play, $user_play, GameResults::whoWin($computer_play, $user_play));
        $this->setGameResult($this->model->getResults()); //array
        // TODO zdebbugowanie poniższej funckji
        //print_r($this->game_result[array_key_last($this->game_result)]);
        $this->getView('game', [
            $this->getGameResult(
                array_key_last($this->game_result), "Computer play"),
            $this->getGameResult(
                array_key_last($this->game_result), "Who wins")
        ]);
        /**
         * TODO stworzenie interfejsu przekierowującego
         * TODO przebudowa obiektów zgodnie z solid 5 - metody tego
         *      wymagające przenieść do interfejsów
         */

    }
}