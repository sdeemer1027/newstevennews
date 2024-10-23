<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class MovieController extends Controller
{
    public function index()
    {

 //       $qrCode = QrCode::size(300)->generate('https://steven.news/hatfield/and/mccoy');
        $fullUrl = 'https://steven.news/hatfield/and/mccoy';
        $qrCode = QrCode::size(300)->generate($fullUrl);

 //       dd($fullUrl);

        return view('ham.index', compact('qrCode'));
    }
}
