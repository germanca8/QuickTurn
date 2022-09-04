<?php

namespace App\Exceptions;

use Exception;

class EntidadException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        return response(["error"=>"This name its already used"],446);
    }
}
