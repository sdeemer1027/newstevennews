<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use OpenFoodFacts;

class FoodfactController extends Controller
{
  public function index(Request $request): View
{
    // Initialize variables
    $error = null;
    $product = null;

    // Get product details by barcode
    try {
        // Fetch product details from OpenFoodFacts API
 //       $response = OpenFoodFacts::barcode('041364544762'); // Replace with actual barcode
        $response = OpenFoodFacts::barcode('024100940295'); // Replace with actual barcode
//dd($response);
        // Check if the response is an array and if the 'product' key exists
        if (is_array($response)) {
            $product =  $response; // Extract the product data
            
$product = collect($response); // Convert the product data to a collection

 //$productString = json_encode($product); // Convert the array to a JSON string
// $productString = collect($productString); // Convert the array to a JSON string
//$productString = $product;
//dd($product);

        } else {
            $error = "Product not found.";
        }



//           if (is_array($response) && isset($response['product'])) {
//            $product = $response['product']; // Extract the product data
//        } else {
//            $error = "Product not found.";
//        }


        
    } catch (\Exception $e) {
        // Handle error
        $product = null;
        $error = $e->getMessage();
    }

    // Pass the product data and error message (if any) to the view
    return view('foodfact.index', compact('product', 'error'));
}



  // Show the barcode scanning view
    public function showScanView()
    {
        return view('foodfact.scan'); // Ensure this matches your Blade view file name
    }

    // Process the scanned barcode
    public function processBarcode(Request $request)
    {
        
//dd($request);

        // Validate the barcode input
        $request->validate([
            'barcode' => 'required|string',
        ]);
  // Initialize variables
    $error = null;
    $product = null;

        // Get the scanned barcode value
        $barcode = $request->input('barcode');

        // Find the corresponding product in the database using the barcode
 //       $product = Product::where('barcode', $barcode)->first();

$response = OpenFoodFacts::barcode($barcode); // Replace with actual barcode

//dd($response);


$product = collect($response); // Convert the product data to a collection

        if ($product) {
   //         return view('product-details', compact('product'));

               // Pass the product data and error message (if any) to the view
    return view('foodfact.index', compact('product', 'error'));


        } else {
            return redirect()->route('scan.view')->withErrors(['barcode' => 'Product not found!']);
        }
    }























}
