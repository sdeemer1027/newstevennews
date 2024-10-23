<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MovieController extends Controller
{
    public function index()
    {

        $qrCode = QrCode::size(300)->generate('https://steven.news');
        return view('ham.index', compact('qrCode'));
    }
}
