<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

class SpaController extends Controller {

    function index() {
        return view('spa');
    }

}
