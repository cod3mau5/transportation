<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function administracion()
    {
        return view('administracion');
    }
}
