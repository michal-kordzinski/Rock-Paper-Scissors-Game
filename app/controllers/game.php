<?php

/**
 * Class Home
 */
class Game extends Controller
{
    /**
     * @param string $param
     */
    public function index($param = '')
    {
        $user = $this->getModel('User');
        $user->name = $param;
        $this->getView('game', ['name' => $user->name]);
    }
}