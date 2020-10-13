<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use DataTables;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products.index');
    }

    public function show($id)
    {
        $model = Product::find($id);
        return view('products.show', ['model'=>$model]);
    }

    public function create()
    {
        $model = new Product();
        $category = Category::get();
        return view('products.form', ['model' => $model, 'category' => $category]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'image' => 'required',
          'categories_id' => 'required'
        ]);
        $model['name'] = $request->name;
        $model['categories_id'] = $request->categories_id;
        if($request->file('image')!=NULL){
            $directory = '/upload/';
            $filename = $request->name.'.'.$request->image->getClientOriginalExtension();
            $model['image'] = $directory.$filename;
            $request->image->move(public_path($directory), $filename);
        }
        $model = Product::create($model);
        return response()->json($model);
    }

    public function edit($id)
    {
        $model = Product::findOrFail($id);
        $category = Category::get();
        return view('products.form', ['model' => $model, 'category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
          'image' => 'required',
          'categories_id' => 'required'
        ]);
        $model = Product::findOrFail($id);
        if ($request->file('image')!=NULL){
            if ($model->image !== NULL){
                unlink(public_path($model->image));
            }
        }
        $model = $request->all();
        if($request->file('image')!=NULL){
            $directory = '/upload/';
            $filename = $request->name.'.'.$request->image->getClientOriginalExtension();
            $model['image'] = $directory.$filename;
            $request->image->move(public_path($directory), $filename);
        }
        $model = Product::findOrFail($id)->update($model);
        return response()->json($model);
    }

    public function delete($id)
    {
        $model = Product::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function datatable()
    {
        $model = Product::get();
        return DataTables::of($model)
            ->editColumn('categories_id', function($model){
                return $model->categories->name;
            })
            ->editColumn('image', function($model){
                if ($model->image == NULL){
                    return 'No Image';
                }
                $url = asset($model->image);
                $image = '<img src="'.$url.'" width="100"/>';
                return $image;
            })
            ->addColumn('action', function($model){
                return view('layouts.action',[
                    'model' => $model,
                    'title' => 'Product',
                    'edit' => route('product.edit', $model->id),
                    'delete' => route('product.delete', $model->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
