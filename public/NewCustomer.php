<?php

use App\Illuminate\Http\Request;

require_once '../vendor/autoload.php';

$request = new Request();

$response = App\Http\Controllers\CustomerController::store($request);
dd($response);