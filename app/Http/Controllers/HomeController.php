<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 2/24/21
 * Time: 1:59 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\House;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the houses.
     *

     */

    public function index(){
        $data = House::all();
        $range['max']=House::max('price');
        $range['min']=House::min('price');
        return view('welcome',compact('data','range'));
    }
}