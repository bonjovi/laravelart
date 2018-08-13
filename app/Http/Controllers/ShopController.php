<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use App\Product;
use Auth;


class ShopController extends Controller
{

    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
        
        
        if(request()->style) {
            $products = Product::with('styles')->whereHas('styles', function($query) {
                $query->where('slug', request()->style);
            })->get();
            $styles = Style::all();
        } else {
            $products = Product::inRandomOrder()->take(8)->get();
            $styles = Style::all();
        }




        
       


        return view('shop')->with([
            'products' => $products,
            'styles' => $styles
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
        // $request->validate([
        //     'query' => 'required|min:3',
        // ]);
        $query = $request->input('query');
        
        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")->get();
        $products = Product::search($query)->paginate(10);
        return view('searchresults')->with('products', $products);
    }

    // public function filter(Request $request)
    // {
    //     $query = $request->input('painting');
        

    //     $products = Product::with('styles')->whereHas('styles', function($query) {
    //         $query->where('slug', 'painting');
    //     })->get();

    //     return view('shop')->with('products', $products);
    // }
}
