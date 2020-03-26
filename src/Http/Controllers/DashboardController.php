<?php

namespace EburonMedia\EcmaCore\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('ecma-core::dashboard.index');
    }
}
