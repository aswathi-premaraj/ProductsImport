<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Models\Products;



class HomeController extends Controller
{
    public function index() 
    {   
        $products = Products::all();
        return view('home.index',compact('products'));
    }
    public function productsUpload()
    {
       return view('products_upload');
    }
    public function productsImport(Request $request) 
    {   try{
        Excel::import(new ProductsImport, $request->file('file')->store('temp'));
        return redirect()->back()->with('success', 'Products Imported Successfully');
        }catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
        

    }
}
