<?php

class PositionsController extends Controller
{
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->model = new Position();
    }

    public function index()
    {
        $positions = $this->model->getList();
        $this->data['positions'] = $positions;
    }

    public function edit()
    {
        $params = App::getRouter()->getParams();
        $position = null;

        if (isset($params[0])) {
            $position = Position::getById($params[0]);

            var_dump($position->attributes());
        }

        $this->data['position'] = $position;
    }
}
