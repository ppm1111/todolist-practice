<?php

namespace App\Http\Resources;

use Illuminate\Http\Response;

class SuccessResource extends Response
{
    public function __construct() {
        parent::__construct([
            'code' => '0000',
            'message' => 'success',
            'data' => null
        ]);
    }
}
