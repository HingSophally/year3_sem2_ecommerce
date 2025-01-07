<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {

        $users = Auth::user();
        return view('user.index', compact('users'));
    }


    public function product()
    {
        //        $product = DB::table('products')
        //            ->leftJoin('images', 'images.product_id', '=', 'products.id')
        //            ->join('categories', 'categories.id', '=', 'products.category_id')
        //            ->select(
        //                'categories.name as category_name',
        //                'products.id as id',
        //                'products.name as name',
        //                'products.base_price as price',
        //                DB::raw('MIN(images.image) as image') // Get the first image
        //            )
        //            ->groupBy('products.id', 'products.name', 'products.base_price','categories.name')
        //            ->get();
        $product = DB::table('products')
            ->leftJoin('images', 'images.product_id', '=', 'products.id')
            ->leftJoin('categories as child_categories', 'child_categories.id', '=', 'products.category_id')
            ->leftJoin('categories as parent_categories', 'parent_categories.id', '=', 'child_categories.parent_id')
            ->select(
                DB::raw('COALESCE(parent_categories.name, child_categories.name) as category_name'), // Choose parent if exists
                'products.id as id',
                'products.name as name',
                DB::raw('MAX(products.discount) as discount'),  // Apply aggregate function
                'products.base_price as price',
                DB::raw('MIN(images.image) as image') // Get the first image
            )
            ->groupBy('products.id', 'products.name', 'products.base_price', 'category_name') // Group by the alias we created
            ->get();


        //


        return view('user.index', compact('product'));
    }
}
