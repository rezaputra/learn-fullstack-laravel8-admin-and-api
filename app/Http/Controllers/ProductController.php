<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File; 
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.product.index')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {  
        DB::beginTransaction();
        try {
            $slug = Str::slug($request->name);

            $product = Product::create([
                'name' => $request->name,
                'slug' => $slug,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description
            ]);

            if ($product->error_reporting === null) {
                $lastId = DB::table('products')->latest('id')->first('id');
            
                $gallery = Gallery::create([
                    'product_id' => $lastId->id
                ]);

                if ($gallery->error_reporting === null) {
                    $img0 = time().'-'.$slug.'-'.'img0'.'.'.$request->img0->extension();
                    $img1 = time().'-'.$slug.'-'.'img1'.'.'.$request->img1->extension();
                    $img2 = time().'-'.$slug.'-'.'img2'.'.'.$request->img2->extension();

                    $request->img0->move(public_path('images'), $img0);
                    $request->img1->move(public_path('images'), $img1);
                    $request->img2->move(public_path('images'), $img2);
    

                    $lastId = DB::table('galleries')->latest('id')->first('id');


                    $images = Image::create([
                        'gallery_id' => $lastId->id,
                        'img0' => $img0,
                        'img1' => $img1,
                        'img2' => $img2
                    ]);

                    DB::commit();

                    return redirect()->route('products.index');
                }
            }

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        // $lastId = DB::table('products')->latest('id')->first('id');

        // dd($lastId->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $productItem = new ProductResource($product);

        return view('pages.product.show', ['product' => $productItem]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.product.edit', ['product' => $product]);
        // dd($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        DB::beginTransaction();
        try {
            $slug = Str::slug($request->name);

            $product->update([
                'name' => $request->name,
                'slug' => $slug,
                'stock' => $request->stock,
                'price' => $request->price,
                'description' => $request->description
            ]);

            if ($product->error_reporting === null) {

                $img0 = time().'-'.$slug.'-'.'img0'.'.'.$request->img0->extension();
                $img1 = time().'-'.$slug.'-'.'img1'.'.'.$request->img1->extension();
                $img2 = time().'-'.$slug.'-'.'img2'.'.'.$request->img2->extension();

                if(File::exists(public_path('images\\'.$product->galleryImage->img0)) && File::exists(public_path('images\\'.$product->galleryImage->img1)) && File::exists(public_path('images\\'.$product->galleryImage->img2))){
                    File::delete(public_path('images\\'.$product->galleryImage->img0));
                    File::delete(public_path('images\\'.$product->galleryImage->img1));
                    File::delete(public_path('images\\'.$product->galleryImage->img2));

                    $request->img0->move(public_path('images'), $img0);
                    $request->img1->move(public_path('images'), $img1);
                    $request->img2->move(public_path('images'), $img2);
                }else{
                    dd('false'); 
                }


                $images = Image::where('id', $product->galleryImage->id)->update([
                    'img0' => $img0,
                    'img1' => $img1,
                    'img2' => $img2
                ]);

                DB::commit();

                return redirect()->route('products.index');
            }

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        DB::beginTransaction();
        try {
            $product->delete();
        
            $gallery = Gallery::findOrFail($product->galleryImage->gallery_id);
            $gallery->delete();

            $image = Image::findOrFail($product->galleryImage->id);
            $image->delete();

            DB::commit();

            return redirect()->route('products.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
