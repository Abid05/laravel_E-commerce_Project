<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //index method for showing data
    public function index(){

        $data =  Category::all();
        return view('admin.category.category.index',compact('data'));
    }
    
    //store methode
    public function store(Request $request){
        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:55',
        ]);

       Category::insert([
            'category_name'=>$request->category_name,
            'category_slug'=>Str::slug($request->category_name,'-')
       ]);
       $notifiaction =['messege'=>'Category Inserted!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);

    }

    //delete methode
    public function delete($id){
        $category = Category::find($id);
        $category->delete(); 
        
        $notifiaction =['messege'=>'Category Deleted!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);
    }

    //Edit methode
    public function edit($id){
        $data =Category::find($id);
        return $data;
        
    }

    //Update methode
    public function update(Request $request){
        $id = $request->id;
        Category::where('id', '=', $id)->update([
        'category_name'=>$request->category_name,
        'category_slug'=>Str::slug($request->category_name,'-')
       
    ]);

        $notifiaction =['messege'=>'Category Updated!','alert-type'=>'success'];
        return redirect()->back()->with($notifiaction);
    }
}
