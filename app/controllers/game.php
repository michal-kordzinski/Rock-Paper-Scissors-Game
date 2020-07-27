<?php

/**
 * Class Home
 */
class Game extends Controller
{
    /**
     * @var array
     */


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
     *
     */
    public function play()
    {
        $this->model = $this->getModel('GameModel');
        //$computer_play = GameResults::ResultConversion(RandomizeNumber::randomize()); //string
        $this->model->setComputerPlay(GameResults::ResultConversion(RandomizeNumber::randomize()));
        //$user_play = $_POST['submit']; //string
        $this->model->setUserPlay();
        $this->model->saveResults();
//        echo '<pre>' . var_dump($this->model->getGameResults()) . '</pre>';
//        echo '<pre>' . $_SESSION['game_results'][1]['User play'] . '</pre>';
        $this->getView('game', [
            $this->model->getGameResults(false, "Computer play", true),
            $this->model->getGameResults(false, "Who wins", true)
        ]);
        /**
         * TODO stworzenie interfejsu przekierowującego
         * TODO przebudowa obiektów zgodnie z solid 5 - metody tego
         *      wymagające przenieść do trait`ów
         */

    }
}