<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('select_dates');
        if (session()->get('num_user') == '') {
            return redirect()->to('/login');
            }
    }
}
