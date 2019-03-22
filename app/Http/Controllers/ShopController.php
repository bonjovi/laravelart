<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Style;
use App\Material;
use App\Surface;
use App\Theme;
use App\Painter;
use Auth;
use Illuminate\Routing\Route;
use App\Http\Controllers\Mail;
use App\Http\Controllers\Session;
use DB;
use App\Http\Controllers\Validator;

class ShopController extends Controller
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

        

        return view('shop')->with([
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
            /*'filterVisibility' => $filterVisibility,*/
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

        

        return view('dealer.shop')->with([
            'products' => $products,
            'styles' => $styles,
            'materials' => $materials,
            'themes' => $themes,
            'surfaces' => $surfaces,
            // 'min_price' => $min_price,
            // 'max_price' => $max_price,
            'min_width' => $min_width,
            'max_width' => $max_width,
            'min_height' => $min_height,
            'max_height' => $max_height,
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

    public function add()
    {

        $products = Product::all();
        $painters = Painter::all();
        $styles = Style::all();
        $materials = Material::all();
        $surfaces = Surface::all();
        $themes = Theme::all();

        return view('account.painting_add')->with([
            'user' => Auth::user(),
            'products' => $products,
            'painters' => $painters,
            'styles' => $styles,
            'materials' => $materials,
            'surfaces' => $surfaces,
            'themes' => $themes
        ]);
    }


    public function store(Request $request)
    {
        // $this->validate(request(), [
        //     'title' => 'required|min:2'
        // ]);

        $messages = [
            'name.required' => 'Поле "Название" должно быть заполнено',
            'name.min' => 'Поле "Название" должно быть длиной не менее 2-х символов',
            'painter.required' => 'Поле "Художник" должно быть заполнено',
            'style.required' => 'Поле "Стиль" должно быть заполнено',
            'material.required' => 'Поле "Материал" должно быть заполнено',
            'surface.required' => 'Поле "Поверхность" должно быть заполнено',
            'theme.required' => 'Поле "Тема" должно быть заполнено',
            'dimension_width.required' => 'Поле "Ширина" должно быть заполнено',
            'dimension_width.numeric' => 'Поле "Ширина" должно быть числом',
            'dimension_height.required' => 'Поле "Высота" должно быть заполнено',
            'dimension_height.numeric' => 'Поле "Высота" должно быть числом',
            'image.required' => 'Поле "Фото" должно быть заполнено',
            'price.numeric' => 'Поле "Цена" должно быть числом',
            'year.numeric' => 'Поле "Год" должно быть числом',
        ];

        $v = \Validator::make($request->all(), [
            'name' => 'required|min:2',
            'painter' => 'required',
            'style' => 'required',
            'material' => 'required',
            'surface' => 'required',
            'theme' => 'required',
            'dimension_width' => 'required|numeric',
            'dimension_height' => 'required|numeric',
            'image' => 'required',
            'price' => 'nullable|numeric',
            'year' => 'nullable|numeric'

        ], $messages);
    
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors())->withInput();
        }
        //$path = $request->file('image')->store('uploads', 'public');
        //echo $path; die;
        
        if($request->file('images') != null) {
            $imagesArray = $request->file('images');

            if(request()->hasFile('images')) {
                foreach($imagesArray as $oneImage) {
                    $imagesData[] = $oneImage->store('uploads', 'public');
                }
            }
        } else {
            $imagesData = '';
        }
        
        
        
        
        
        //var_dump($request->is_for_dealers); die;
        

        $product = Product::create([
            'name' => $request->name,
            //'painter_id' => (int)$painter_id->id,
            //'style' => $request->style,
            // 'material' => $request->material,
            // 'surface' => $request->surface,
            // 'theme' => $request->theme,
            'dimension_width' => $request->dimension_width,
            'dimension_height' => $request->dimension_height,
            'year' => $request->year,
            'country' => $request->country,
            'price' => $request->price, 
            'description' => $request->description, 
            'image' => $request->file('image')->store('uploads', 'public'),   
            'images' => json_encode($imagesData),
            'is_for_dealers' => ($request->is_for_dealers != NULL) ? $request->is_for_dealers : '0'
        ]);





        $painter_lastname = substr($request->painter, 0, strpos($request->painter, ' ' ));
        
        $painter_existing = Painter::where('lastname', $painter_lastname)->first();
        //var_dump($painter_id->id); die;
        if(isset($painter_existing->id)) {
            $painter_id = $painter_existing->id;
        } else {
            $painter_id = 21;

            $product->fill([
                'unknown_painter' => $request->painter
            ]);

            \Mail::send('emails.unknownpainter', [
                'painter' => $request->painter
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Посетитель добавил картину с неизвестным художником');
            });
        }





        $product->fill([
            'slug' => $product->slug
        ]);

        $product->fill([
            'painter_id' => (int)$painter_id
        ]);

        

        

        foreach($request->style as $oneStyle) {
            $product->styles()->save($product, [
                'product_id' => $product->id, 
                'style_id' => $oneStyle,
            ]);
        }

        foreach($request->material as $oneMaterial) {
            $product->materials()->save($product, [
                'product_id' => $product->id, 
                'material_id' => $oneMaterial,
            ]);
        }
        
        foreach($request->surface as $oneSurface) {
            $product->surfaces()->save($product, [
                'product_id' => $product->id, 
                'surface_id' => $oneSurface,
            ]);  
        }

        foreach($request->theme as $oneTheme) {
            $product->themes()->save($product, [
                'product_id' => $product->id, 
                'theme_id' => $oneTheme,
            ]);
        }

        \Session::flash('message', 'Картина была успешно добавлена');

        return redirect()->route('account.paintings');
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $products = Product::all();
        $painters = Painter::all();
        $styles = Style::all();
        $materials = Material::all();
        $surfaces = Surface::all();
        $themes = Theme::all();
        $product = Product::find($id);

        return view('account.paintings_edit')->with([
            'user' => Auth::user(),
            'product' => $product,
            'products' => $products,
            'styles' => $styles,
            'materials' => $materials,
            'surfaces' => $surfaces,
            'themes' => $themes,
            'title'=> 'Картины',
            'painters' => $painters
        ]);
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

        $imagesArray = $request->file('images');

        if(request()->hasFile('images')) {
            foreach($imagesArray as $oneImage) {
                $imagesData[] = $oneImage->store('uploads', 'public');
            }
        }


        $product = Product::find($id);

        // Deleting style_product
        DB::table('style_product')->where(['product_id' => $id])->delete();

        // Deleting material_product
        DB::table('material_product')->where(['product_id' => $id])->delete();

        // Deleting surface_product
        DB::table('surface_product')->where(['product_id' => $id])->delete();

        // Deleting theme_product
        DB::table('theme_product')->where(['product_id' => $id])->delete();






        $product->fill($request->all());
        
        if($request->file('image') != null) {
            $product->fill([
                'image' => $request->file('image')->store('uploads', 'public')
            ]);
        }

        if($request->file('images') != null) {
            $product->fill([
                'images' => json_encode($imagesData)
            ]);
        }


        $painter_lastname = substr($request->painter, 0, strpos($request->painter, ' ' ));
        
        $painter_existing = Painter::where('lastname', $painter_lastname)->first();
        //var_dump($painter_id->id); die;
        if(isset($painter_existing->id)) {
            $painter_id = $painter_existing->id;
            $product->fill([
                'painter_id' => (int)$painter_id
            ]);
            $product->fill([
                'unknown_painter' => NULL
            ]);
        } else {
            $painter_id = 21;

            $product->fill([
                'painter_id' => 21
            ]);

            $product->fill([
                'unknown_painter' => $request->painter
            ]);

            \Mail::send('emails.unknownpainter', [
                'painter' => $request->painter
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Посетитель добавил картину с неизвестным художником');
            });
        }

        $product->fill([
            'slug' => $product->slug
        ]);

        $product->fill([
            'is_for_dealers' => ($request->is_for_dealers != NULL) ? $request->is_for_dealers : '0'
        ]);

        





        
        $product->save();

        \Session::flash('message', 'Картина была успешно обновлена');

        foreach($request->style as $oneStyle) {
            $product->styles()->save($product, [
                'product_id' => $product->id, 
                'style_id' => $oneStyle,
            ]);
        }

        foreach($request->material as $oneMaterial) {
            $product->materials()->save($product, [
                'product_id' => $product->id, 
                'material_id' => $oneMaterial,
            ]);
        }
        
        foreach($request->surface as $oneSurface) {
            $product->surfaces()->save($product, [
                'product_id' => $product->id, 
                'surface_id' => $oneSurface,
            ]);  
        }

        foreach($request->theme as $oneTheme) {
            $product->themes()->save($product, [
                'product_id' => $product->id, 
                'theme_id' => $oneTheme,
            ]);
        }


        


        return redirect()->route('account.paintings');
    }

    public function showcontacts(Request $request, $id)
    {
        $product = Product::find($id);

        if(Auth::user()) {

            \Mail::send('emails.showcontacts', [
                'product' => $product,
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Посетитель посмотрел контакты продавца');
            });

            return view('product')->with([
                'product' => $product,
                'productSeller' => '<div class="text product__showcontacts">' . $product->user->email . '<span class="product__greenstar" title="Продавец имеет статус подтверждённого нами партнёра"> *</span></div>',
            ]);
        } else {
            return view('product')->with([
                'product' => $product,
                'productSeller' => '<div class="text product__showcontacts">Контакты доступны только зарегистрированным пользователям. <a href="/register" class="text">Зарегистрируйтесь</a> или <a href="/login" class="text">авторизуйтесь</a>.</div>'
            ]);
        }   
    }



    public function showcontacts_for_dealer(Request $request, $id)
    {
        $product = Product::find($id);

        if(Auth::user()) {

            \Mail::send('emails.showcontacts_for_dealer', [
                'product' => $product,
            ], function($message)
            {
                $message->to(config('mail.username'), config('mail.from.name'))->subject('Дилер отправил запрос на цену');
            });

            return view('dealer.product')->with([
                'product' => $product,
                'user' => Auth::user(),
                'productSeller' => '<div class="text product__showcontacts">Ваш запрос отправлен администраторам сайта. С Вами свяжутся.</div>'
            ]);
        } else {
            return view('dealer.product')->with([
                'product' => $product,
                'user' => Auth::user(),
                'productSeller' => '<div class="text product__showcontacts">Контакты доступны только зарегистрированным пользователям. <a href="/register" class="text">Зарегистрируйтесь</a> или <a href="/login" class="text">авторизуйтесь</a>.</div>'
            ]);
        }   
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('products')->where(['id' => $id])->delete();
        \Session::flash('message', 'Картина была удалена');
        return redirect()->route('account.paintings');
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
