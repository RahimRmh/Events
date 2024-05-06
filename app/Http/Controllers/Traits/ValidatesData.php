<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;

trait ValidatesData
{
    protected function validateData(Request $request)
    {
        return $request->validated();
    }
}
?>