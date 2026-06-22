<?php

namespace App\Http\Controllers;

class DonateController extends Controller
{
    public function index()
    {
        return view('pages.get-involved.donate');
    }
}
