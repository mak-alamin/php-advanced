<?php 

namespace APP\Controllers\Admin;

use APP\Core\Controller;

class UsersController extends Controller{

    public $model;
    public $data;

    public function __construct($model)
    {
        $this->model = $model;

        $this->data = $this->model->getAllData('users');
    }
}