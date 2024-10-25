<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodCategory;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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






    // Show the barcode scanning view
    public function menu()
    {
 //       $foodcategory = '';
        $recipe = Food::with('category','recipes')->limit(10)->get();

//dd($recipe);

        $foodcategory = FoodCategory::get(); //all();
        return view('food.index',compact('foodcategory','recipe')); // Ensure this matches your Blade view file name
    }
    public function bycategory($cat)
    {

        $recipe = Food::with('category','recipes')->where('foodcategory_id',$cat)
            ->where('updated_at',NULL)
            ->get();
        $foodcategory = FoodCategory::all();
        return view('food.index',compact('foodcategory','recipe')); // Ensure this matches your Blade view file name
    }
    public function showfood($menu)
    {
        $recipes = Recipe::where('food_id', $menu)->with('food')->first();
        $foodcategory = FoodCategory::all();
$foodname = Food::where('id',$menu)->first();
   //     dd($recipes,$menu,$foodname);

        return view('food.show',compact('foodcategory','recipes','foodname')); // Ensure this matches your Blade view file name
    }


    public function editfood($id)
    {

  //      dd($id);
        // Find the blog by slug
        $menu = Recipe::where('id', $id)->with('food')->firstOrFail();
        $foodcategory = FoodCategory::all();
        // Return the edit view with the blog data
        return view('food.edit', compact('menu','foodcategory'));
    }
    public function update(Request $request, $id)
    {


    //    dd($request, $id);
// Validate the request ingredients":"","directions":"","food_id":76,
        $request->validate([
            'text' => 'required',
            'ingredients' => 'required', // HTML content
            'directions' => 'required',
        ]);

        // Find the blog by slug
        $meal = Recipe::where('id', $id)->firstOrFail();
$fnow = Food::where('id',$meal->food_id)->firstOrFail();

        // Handle the file upload
        if ($request->hasFile('picture')) {
            // Validate the file upload (optional but recommended)
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
            ]);

            // Store the file in the storage/app/public/food_images directory
            $filePath = $request->file('picture')->store('food_images', 'public');

            // If the food already has a picture, delete the old file
            if ($meal->picture_url) {
                Storage::disk('public')->delete($meal->picture_url);
            }

            // Save the new file path in the database
            $meal->picture_url = $filePath;
        }







        // Update the blog fields
        $meal->text = $request->input('text');
  //      $meal->food_id = $request->input('category');
        $meal->ingredients = $request->input('ingredients'); // Assume content stores HTML
        $meal->directions = $request->input('directions');
        $meal->updated_at = now();
        // Save the changes
        $meal->save();
        $fnow->updated_at = now();
        $fnow->save();
//dd($meal);
        // Redirect to the blog show page
        return redirect()->route('food.menu', $meal->food_id)->with('success', 'Blog updated successfully.');


    }

    public function create($fid = null)
    {
  //      dd($fid);
        if($fid) {
            $fid = Food::where('id',$fid)->first();
        }else{

        }

        $foodcategory = FoodCategory::all();
        // Logic to show the form to create a new recipe
        return view('food.create',compact('foodcategory','fid'));
    }

    // Store the new menu post
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'text' => 'required|string|max:255',
            'ingredients' => 'required', // HTML content
            'directions' => 'required',
        ]);
        // Handle file upload if a file was provided
        $picturePath = '';
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('food_images', 'public');
        }
//dd($request);
        $meal = Recipe::create([
            'text' => $request->input('text'),
            'ingredients' => $request->input('ingredients'),
            'directions' =>  $request->input('directions'),
            'food_id' => $request->input('food_id'),
            'picture_url' => $picturePath,
        ]);
        // Attach selected categories to the blog
     //   $blog->categories()->attach($request->input('categories'));

        return redirect()->route('food.index')->with('success', 'Blog created successfully.');
    }


}
