<?php

/**
 * Class Home
 */
class Game extends Controller
{
    /**
     * @var
     */
    private $game_result;

    /**
     * @return mixed
     * TODO zdebbugowanie zasięgu funckji - wychodzi poza zakres; implementacja
     *              nowej metody zwracania poszczególnych elementów z tablicy
     */
    public function getGameResult($index)
    {
        return $this->game_result[$index];
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
        $this->getView('game', [$this->getGameResult(0),$this->getGameResult(2) ]);
        /**
         * TODO zwrócenie widoku game wraz z parametrami (wynikami gry)
         * TODO dowiedzenie się, z jakich przyczyn zwracany widok nie zawiera
         *      styli oraz obrazków
         * TODO stworzenie interfejsu przekierowującego
         * TODO przebudowa obiektów zgodnie z solid 5 - metody tego
         *      wymagające przenieść do interfejsów
         */

    }
}