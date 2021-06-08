<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PulkitJalan\Google\Facades\Google;
use Revolution\Google\Sheets\Sheets;


class SpreadController extends Controller
{
    function index()
    {
        $rows = Sheets::sheet('DataSheet')->get();

        $header = $rows->pull(0);
        $values = Sheets::collection($header, $rows);
        dd($values);
    }
}
