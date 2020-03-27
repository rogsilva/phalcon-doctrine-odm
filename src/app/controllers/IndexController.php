<?php

declare(strict_types=1);

namespace App\Controllers;

class IndexController extends BaseController
{

    public function indexAction()
    {
        $this->response
            ->setJsonContent(['message' => 'Wellcome!'])
            ->send();
    }

    public function route404Action()
    {
        $this->response
            ->setStatusCode(404, 'Not Found')
            ->setJsonContent(['message' => 'Not Found!'])
            ->send();
    }
}
