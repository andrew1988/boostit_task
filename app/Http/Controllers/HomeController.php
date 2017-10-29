<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cities;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citiesList = User::with('cities')->where('id',Auth::user()->id)->first();
        return view('home',['citiesList'=>$citiesList->cities]);
    }

    public function addCity(Request $request){
        $city = new Cities;
        $city->city = $request->city;
        $city->user_id = Auth::user()->id;
        $city->measuring_unit = $request->unitate_masura;

        $city->save();
        return back();
    }
    public function editCity(Request $request){
        $city = Cities::find($request->city_id);
        $city->city = $request->city;
        $city->save();
        return back();
    }
    public function deleteCity($id){
          $city = Cities::find($id);
          $city->delete();
          return back();
    }
}
