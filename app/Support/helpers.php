<?php

if (! function_exists('dd')) {
    function dd($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
        die();
    }
}

if (! function_exists('response')) {
    function response($content = null, $responseCode = 200)
    {
        return [
            'data' => $content,
            'code' => $responseCode
        ];
    }
}

if (! function_exists('validator')) {
    function validator($data = [], $rules = [], $messages = [])
    {
        return new \App\Support\Validation\Validator();
    }
}

