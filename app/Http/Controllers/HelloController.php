<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(Request $request) {
        $nama = $request->get('nama');
        return 'Hello ' .$nama;
    }
}