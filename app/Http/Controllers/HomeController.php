<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs sorted by latest
        $qrCode = QrCode::size(300)->generate('https://steven.news');
        return view('welcome', compact('blogs','qrCode'));
    }


//class QrCodeController extends Controller
//{
    public function generate()
    {
        $qrCode = QrCode::size(300)->generate('https://steven.news');
        return view('qr_code', compact('qrCode'));
    }
//}


    public function resume()
    {
        $blogs = Blog::latest()->get(); // Fetch all blogs sorted by latest
        return view('resume', compact('blogs'));
    }
}
