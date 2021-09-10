<?php

namespace App\Http\Controllers;
use App\Meal;
use Illuminate\Http\Request;


class AppController extends Controller
{    
    public function welcome(){
        //  $meals=Meal::All();
        //  $meals=Meal::inRandomOrder()->limit(9)->get();
        $meals=Meal::paginate(9);


        // return view('welcome',["meals" => $meals]); ou
        return view('welcome',compact('meals'));
    }
    public function aboutPage(){

        return view( ' about ', [ 'message' => 'this is About page ...' ] );
    }
}
