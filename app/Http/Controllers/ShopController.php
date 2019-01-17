<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Style;
use App\Material;
use App\Surface;
use App\Theme;
use Auth;
use Illuminate\Routing\Route;


class ShopController extends Controller
{

    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index(Request $request)
    {
        $products = Product::latest();

        if ($request->has('style'))
        {
            $products = Product::with('styles')->whereHas('styles', function($query) {
                $query->whereIn('slug', request()->style);
            });
            
            
        }

        $styles = Style::all();
        $materials = Material::all();
        $surfaces = Surface::all();
        $themes = Theme::all();

        if($request->min_price && $request->max_price){
            $products = $products->where('price','>=',$request->min_price);
            $products = $products->where('price','<=',$request->max_price);

            $filterVisibility = 'filter_uncollapsed';
        } else {
            $filterVisibility = '';
        }

        $min_price = Product::min('price');
        $max_price = Product::max('price');


        $products = $products->paginate(27);
        
        count($products) == 0 ? $notfound = 'К сожалению, под эти параметры ничего не нашлось. Попробуйте изменить данные в фильтре.' : $notfound = '';

        

        return view('shop')->with([
            'products' => $products,
            'styles' => $styles,
            'materials' => $materials,
            'themes' => $themes,
            'surfaces' => $surfaces,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'notfound' => $notfound,
            'filterVisibility' => $filterVisibility,
            'title' => 'Картины'
        ]);
    }

    public function index_dealer(Request $request)
    {
        $products = Product::where('is_for_dealers', 1)->latest();

        if ($request->has('style'))
        {
            $products = Product::with('styles')->whereHas('styles', function($query) {
                $query->whereIn('slug', request()->style);
            });
            
            
        }

        $styles = Style::all();
        $materials = Material::all();
        $surfaces = Surface::all();
        $themes = Theme::all();

        if($request->min_price && $request->max_price){
            $products = $products->where('price','>=',$request->min_price);
            $products = $products->where('price','<=',$request->max_price);

            $filterVisibility = 'filter_uncollapsed';
        } else {
            $filterVisibility = '';
        }

        $min_price = Product::min('price');
        $max_price = Product::max('price');


        $products = $products->paginate(27);
        
        count($products) == 0 ? $notfound = 'К сожалению, под эти параметры ничего не нашлось. Попробуйте изменить данные в фильтре.' : $notfound = '';

        

        return view('dealer.shop')->with([
            'products' => $products,
            'styles' => $styles,
            'materials' => $materials,
            'themes' => $themes,
            'surfaces' => $surfaces,
            'min_price' => $min_price,
            'max_price' => $max_price,
            'notfound' => $notfound,
            'filterVisibility' => $filterVisibility,
            'title' => 'Картины для дилеров',
            'user' => Auth::user()
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {  
        $product = Product::where('slug', $slug)->firstOrFail();
        

        return view('product')->with('product', $product);
    }

    public function show_dealer($slug)
    {  
        $product = Product::where('slug', $slug)->firstOrFail();
        

        return view('dealer.product')->with([
            'product' => $product,
            'user' => Auth::user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('account.paintings_edit')->with(['user' => Auth::user(), 'product' => $product, 'title'=> 'Картины']);
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
        $product = Product::find($id);
        $product->fill($request->all());
        $product->save();

        return redirect()->route('account.paintings');
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

    public function search(Request $request)
    {
        $query = $request->input('query');
        //$notfound = $request->input('query') == '' ? 'Вы ввели пустой поисковый запрос' : $request->input('query');
        $products = Product::search($query)->paginate(10);
        return view('searchresults')->with([
            'products' => $products,
            //'notfound' => $notfound,
        ]);
    }
}
