<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(Request $request){

        $categories = Category::orderBy('updated_at', 'desc');
        if($request->keyword){
            $categories=$categories->where(function($query) use ($request) {
                $query->orWhere('name','like','%'.$request->keyword.'%');
            });
        }
        $categories=$categories->paginate(5);
        return view('admin.categories.list',compact('categories'));
    }

    public function create(){

        return view('admin.categories.add');
    }

    public function store(Request $request){

        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }else{
            $category = new Category();
            $category->name = $request->name;
            $category->status=$request->status;
            $category->is_featured=$request->is_featured;
            $category->save();

            session()->flash('success', 'Category added successfully');
            return response()->json([
                'status' => true,
                'message' => 'Category added successfully'
            ]);
        }
    }
    public function edit($id){

        $category = Category::find($id);
        if(!$category){
            session()->flash('error', 'Category not found');
            return redirect()->route('admin.categories');
        }

        return view('admin.categories.edit',compact('category'));
    }

    public function update(Request $request,$id){

        $category = Category::find($id);

        if(!$category){
            session()->flash('error', 'Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Category not found'
            ]);
        }

        $validator=Validator::make($request->all(),[
            'name'=>'required'
        ]);

        if($validator->fails()){
            
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);

        }else{

            $category->name = $request->name;
            $category->status=$request->status;
            $category->is_featured=$request->is_featured;
            $category->save();
    
            session()->flash('success', 'Category updated successfully');
            return response()->json([
                'status' => true,
                'message' => 'Category updated successfully'
            ]);
        }
    }

    public function delete(Request $request){

        $category = Category::find($request->id);
        if(!$category){
            session()->flash('error', 'Category not found');
            return response()->json([
                'status' => true,
                'message' => 'Category not found'
            ]);
        }
        $category->delete();

        session()->flash('success', 'Category deleted successfully');
        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully'
        ]);
    }
}
