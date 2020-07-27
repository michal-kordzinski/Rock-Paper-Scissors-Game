<?php

/**
 * Class Login
 */
class Results extends Controller
{
    public function index()
    {
        $this->getView('results');
    }
    public function __construct()
    {
        $this->model = $this->getModel("GameModel");
        $this->getView('results', [
            $this->model->getGameResults()
        ]);
    }

}