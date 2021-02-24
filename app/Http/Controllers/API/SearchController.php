<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\House;

class SearchController extends Controller
{
    public function index(Request $request){
       $filter=$request->all();

        $name = $filter['name'];
        $price_min = $filter['minPrice'];
        $price_max =  $filter['maxPrice'];
        $bedrooms = $filter['bedrooms'];
        $bathrooms = $filter['bathrooms'];
        $storeys = $filter['storeys'];;
        $garages = $filter['garages'];

      $house =  House::when($name , function($query ) use($name){

        return $query->where('name', 'LIKE' ,  '%' . $name . '%'  );

    })->when($price_min || $price_max, function( $query) use ($price_min , $price_max) {
            
            return $query->whereBetween('price' , array($price_min,$price_max));

        })->when($bedrooms, function($query) use ($bedrooms){

            return $query->where('bedrooms' , $bedrooms);

        })->when($bathrooms, function($query)  use ($bathrooms){

            return $query->where('bathrooms' , $bathrooms);
        })->when($storeys, function($query) use ($storeys){

            return $query->where('storeys' , $storeys);

        })->when($garages, function($query) use ($garages){

            return $query->where('garages' , $garages);

        })->get();


        return response()->json($house);
    }


}
