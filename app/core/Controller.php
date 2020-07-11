<?php

/**
 * Class Controller
 */
abstract class Controller
{
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
        return new $model();
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
}