<?php

namespace Authentication\Libraries;

use CodeIgniter\HTTP\Response;
use Authentication\Models\AuthenticationModel;

class AuthenticationLibrary
{
    public $response;

    public function __construct()
    {
        $config = config(App::class);
        $this->response = new Response($config);
    }
}
