<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$model = Category::get();
        return view('home', ['model'=>$model]);
    }

    public function detail($id)
    {
    	$model = Product::where('categories_id', $id)->get();
    	$bagi = $id%3;
    	if($bagi==1){
    		$row=($id+2)/3;
    	}
    	elseif($bagi==2){
    		$row=($id+1)/3;
    	}
    	elseif($bagi==0){
    		$row=$id/3;
    	}
        $table = '<tr id="detail-product" class="row'.$row.' image'.$id.'"><td colspan="7"><div class="card-body bg-light"><table width="100%">';
		foreach($model as $a){
			$table .= '<tr><td><img src="'.asset($a->image).'" width="20" height="20"/></td>';
			$table .= '<td>'.$a->name.'</td>';
			$table .= '<td>Rp'.$a->price.'</td>';
			$table .= '<td>'.$a->desc.'</td>';
			$table .= '<td><a href="'.route('product',$a->id).'" class="btn btn-success btn-sm modal-show">Beli</a></td></tr>';
        }
        // dd($a);
		$table .= '</table></div></td></tr>';
        return $table;
    }
    public function product($id)
    {
    	$model = Product::find($id);
        return view('form',['model'=>$model]);
    }
    public function confirm(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'phone_number' => ['required'],
            'installment' => ['required']
        ]);
        return response()->json($request);
    }
    public function save(Request $request)
    {
        $model = Order::create([
            'products_id' => $request->id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'installment' => $request->installment
        ]);
        return response()->json($model);
    }

}
