<?php

namespace App\Http\Controllers;

use App\Category;
use DataTables;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function show($id)
    {
        $model = Category::find($id);
        return view('categories.show', ['model'=>$model]);
    }

    public function create()
    {
        $model = new Category();
        return view('categories.form', ['model' => $model]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
          'name' => 'required',
          'image' => 'required',
        ]);
        $model['name'] = $request->name;
        if($request->file('image')!=NULL){
            $directory = '/upload/';
            $filename = $request->name.'.'.$request->image->getClientOriginalExtension();
            $model['image'] = $directory.$filename;
            $request->image->move(public_path($directory), $filename);
        }
        $model = Category::create($model);
        return response()->json($model);
    }

    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('categories.form', ['model' => $model]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required',
          'image' => 'required',
        ]);
        $model = Category::findOrFail($id);
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
        $model = Category::findOrFail($id)->update($model);
        return response()->json($model);
    }

    public function delete($id)
    {
        $model = Category::findOrFail($id)->delete();
        return response()->json($model);
    }

    public function datatable()
    {
        $model = Category::get();
        return DataTables::of($model)
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
                    'title' => 'Category',
                    'edit' => route('category.edit', $model->id),
                    'delete' => route('category.delete', $model->id)
                ]);
            })
            ->addIndexColumn()
            // ->removeColumn(['id','created_at','updated_at'])
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
}
