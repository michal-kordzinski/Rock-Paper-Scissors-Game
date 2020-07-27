<?php

/**
 * Class Controller
 */
abstract class Controller
{
    protected $model;
    protected $game_result = [];
    /**
     * return a model
     *
     * @param $model
     *
     * @return object
     */
    protected function getModel($model)
    {
        require_once('../app/models/' . $model . '.php');
        return new $model;
    }

    /**
     * return a view
     *
     * @param       $view
     * @param array $data
     */
    protected function getView($view, $data = [])
    {
        require_once('../app/views/' . $view . '.php');
    }

//    protected function setGameResult($game_result)
//    {
//        array_push($this->game_result, $game_result);
//    }
//
//    protected function getGameResult($number_of_game, $key_of_value) :array
//    {
//        return $this->game_result[$number_of_game][$key_of_value];
//    }

}