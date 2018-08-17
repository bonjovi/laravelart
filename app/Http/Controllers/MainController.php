<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::inRandomOrder()->take(8);

        if ($request->has('style'))
        {
            $products = Product::with('styles')->whereHas('styles', function($query) {
                $query->whereIn('slug', request()->style);
            });
        }

        if($request->min_price && $request->max_price){
            $products = $products->where('price','>=',$request->min_price);
            $products = $products->where('price','<=',$request->max_price);

            $filterVisibility = 'filter_uncollapsed';
        } else {
            $filterVisibility = '';
        }

        $min_price = Product::min('price');
        $max_price = Product::max('price');


        //return view('layouts.main')->with('products', $products->get());

        $products = $products->get();
        
        count($products) == 0 ? $notfound = 'К сожалению, под эти параметры ничего не нашлось. Попробуйте изменить данные в фильтре.' : $notfound = '';

        

        return view('layouts.main')->with([
            'products' => $products,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'notfound' => $notfound,
            'filterVisibility' => $filterVisibility
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
