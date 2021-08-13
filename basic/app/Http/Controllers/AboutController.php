<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AboutController extends Controller
{

    public function HomeAbout(){
        $homeabout = HomeAbout::latest()->get();
        return view('admin.home.index',compact('homeabout'));
    }
    public function AddAbout(){
        return view('admin.home.create');
    }

    public function StoreAbout (Request $request) {





        HomeAbout::insert([

         'title'=>$request->title,
         'short_dis'=>$request->short_des,
         'long_dis'=>$request->long_des,
         'created_at' => Carbon::now()
         ]);

         return Redirect()->route('home.about')->with('success','about insert');

     }
}
