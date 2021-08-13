<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use  Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function allCat(){



      //  $categories = Category::all();
    /*$categories = DB::table('categories')
    ->join('users','categories.user_id','users.id')
    ->select('categories.*','users.name')
    ->latest()->paginate(6);*/

     $categories = Category::latest()->paginate(6);
     $trachCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories','trachCat'));
    }


    public function addCat(Request $request){

        $validateData = $request->validate(
            [
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'Please Input Category Name',
            ]
        );


        Category::insert(
            [
                'category_name' => $request->category_name,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]
        );


        // $category = new Category;
        // $category->category_name= $request->category_name;
        // $category->user_id= Auth::user()->id;
        // $category->save();

        // $data = array();
        // $data['category_name'] = $request->category_name;
        // $data['user_id'] = Auth::user()->id;
        // DB::table('categories')->insert($data);
        return Redirect()->back()->with('success','Insertion reussi');
    }

    public function Edit($id){
        $categories = Category::find($id);
       // dd($categories);
        return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request, $id){

        $update = Category::find($id)->update(
            [
                'category_name' => $request->category_name,
                'user_id' => Auth::user()->id,
            ]
        );
        return Redirect()->route('all.category')->with('success','Modification reussi');



    }

    public function Softdelete($id){

        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Suppression reussi');

    }

    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Restore reussi');
    }
    public function Pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','delete reussi');
    }


}
