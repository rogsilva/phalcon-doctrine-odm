<?php

declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\View;

class BaseController extends Controller
{
    public function initialize()
    {
        $this->view->setRenderLevel(
            View::LEVEL_NO_RENDER
        );
    }
}
