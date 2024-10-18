<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">

        </h2>
    </x-slot>
<BR>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-black dark:text-gray-100">
                   

<h1>{{ $product['product_name'] ?? ''}}</h1>

{{--$product--}}

<img src="{{ $product['image_front_url'] ?? ''}}"><BR>

<img src="{{ $product['image_ingredients_url'] ?? ''}}"><BR>



<div class="container">

    <h1>Product Details</h1>

    @if(isset($error))
        <div class="alert alert-danger">
            <strong>Error:</strong> {{ $error }}
        </div>
    @elseif(isset($product) && !empty($product))
        <div class="card">
            <div class="card-body">
                <h2>{{ $product['product_name'] ?? ''}}</h2>
                <p><strong>Brand:</strong> {{ $product['brands'] ?? ''}}</p>
                <p><strong>brand_owner:</strong> {{ $product['brand_owner'] ?? ''}}</p>
                <p><strong>Quantity:</strong> {{ $product['quantity'] ?? ''}}</p>
                <p><strong>Ingredients:</strong> {{ $product['ingredients_text'] ?? ''}}</p>
                <p><strong>Nutritional Info:</strong></p>
                <ul>
                    <li>Calories: {{ $product['nutriments']['energy_value'] ?? 'N/A' }} kcal</li>
                    <li>Fat: {{ $product['nutriments']['fat_value'] ?? 'N/A' }} g</li>
                    <li>Carbohydrates: {{ $product['nutriments']['carbohydrates_value'] ?? 'N/A' }} g</li>
                    <li>Protein: {{ $product['nutriments']['proteins_value'] ?? 'N/A' }} g</li>
                </ul>

                <p><strong>allergens:</strong> {{ $product['allergens'] ?? ''}}</p>
                 <p><strong>allergens_from_ingredients:</strong> {{ $product['allergens_from_ingredients'] ?? ''}}</p>
            </div>
        </div>
    @else
        <p>No product details found.</p>
    @endif




<BR>
<a href="{{route('foodfact.scan')}}" class="btn btn-primary btn-sm"> Scan a Product</a>

<BR>
</div>
<BR><BR><BR>
<HR>

{{$product}}











                </div>
            </div>
        </div>
    </div>

</x-app-layout>
