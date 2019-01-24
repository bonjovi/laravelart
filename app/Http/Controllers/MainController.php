<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Style;
use App\Material;
use App\Surface;
use App\Theme;
use Illuminate\Routing\Route;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::oldest();

        if($request->has('style')) $products = Product::with('styles')->whereHas('styles', function($query) { $query->whereIn('slug', request()->style); });
        if($request->has('material')) $products = Product::with('materials')->whereHas('materials', function($query) { $query->whereIn('slug', request()->material); });
        if($request->has('surface')) $products = Product::with('surfaces')->whereHas('surfaces', function($query) { $query->whereIn('slug', request()->surface); });
        if($request->has('theme')) $products = Product::with('themes')->whereHas('themes', function($query) { $query->whereIn('slug', request()->theme); });
        

        $styles = Style::all();
        $materials = Material::all();
        $surfaces = Surface::all();
        $themes = Theme::all();

        /*$min_price = Product::min('price');
        $max_price = Product::max('price');

        if($request->min_price && $request->max_price){
            $products = $products->where('price','>=',$request->min_price);
            $products = $products->where('price','<=',$request->max_price);

            $filterVisibility = 'filter_uncollapsed';
        } else {
            $filterVisibility = '';
        }*/



        
        


        $min_width = Product::min('dimension_width');
        $max_width = Product::max('dimension_width');

        $min_height = Product::min('dimension_height');
        $max_height = Product::max('dimension_height');

        if($request->min_width && $request->max_width){
            $products = $products->where('dimension_width','>=',$request->min_width);
            $products = $products->where('dimension_width','<=',$request->max_width);
            $products = $products->where('dimension_height','>=',$request->min_height);
            $products = $products->where('dimension_height','<=',$request->max_height);
        } else {
            $products = $products->where('dimension_width','>=',$min_width);
            $products = $products->where('dimension_width','<=',$max_width);
            $products = $products->where('dimension_height','>=',$min_height);
            $products = $products->where('dimension_height','<=',$max_height);
        }

        

        


        $products = $products->paginate(27);
        
        count($products) == 0 ? $notfound = 'К сожалению, под эти параметры ничего не нашлось. Попробуйте изменить данные в фильтре.' : $notfound = '';

        

        return view('layouts.main')->with([
            'products' => $products,
            'styles' => $styles,
            'materials' => $materials,
            'themes' => $themes,
            'surfaces' => $surfaces,
            /*'min_price' => $min_price,
            'max_price' => $max_price,*/
            'min_width' => $min_width,
            'max_width' => $max_width,
            'min_height' => $min_height,
            'max_height' => $max_height,
            'notfound' => $notfound,
            /*'filterVisibility' => $filterVisibility*/
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
