<?php

namespace App\Http\Controllers\backend\product;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use ImageOptimizer;
use Image;
use Illuminate\Support\Facades\Artisan;

use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $list=Product::orderBy('created_at', 'desc')->get();
        } catch (\Exception $e) {
            $list=[];
        }


        return view('backend.products.index', compact('list'));
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
        $this->validate($request, [
        'title' => 'required',
        'description' => 'required',
        'price' => 'required',
        'compare_price' => 'required',
        'quantity' => 'required',
        'weight' => 'required',
        'seo_title' => 'required|max:60|unique:products,seo_title',
        'status' => 'required|integer',
        'seo_description' => 'required|max:160|unique:products,seo_description',
        'files' => 'required',
        'files.*' => 'image|mimes:jpg,jpeg,png'
         ]);

        $date = date_format(date_create(), 'Y-m-d');
        $images = $request->file('files');
        $x=1;

        if ($request->hasFile('files')) {
            foreach ($images as $image) {
                if ($image->isValid()) {
                    $imageName =  Str::slug($request->seo_title).'-'.$date.'-00'.$x.'.'.strtolower($image->extension());

                    // Image::make($image->path())->save(public_path() . '/assets/frontend/images/product-detail/'.$imageName);
                    // Image::make($image->path())->resize(94, 132)->save(public_path() . '/assets/frontend/images/product-detail/slide_thumbnail/'.$imageName);
                    // Image::make($image->path())->resize(50, 50)->save(public_path() . '/assets/frontend/images/product-detail/swatch_thumbnail/'.$imageName);
                    $image->move(public_path() . '/assets/frontend/images/product-detail/', $imageName);

                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/'.$imageName);
                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/slide_thumbnail/'.$imageName);
                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/swatch_thumbnail/'.$imageName);

                    $arr[] = $imageName;
                    $x++;
                }
            }
        }

        $product=new product();
        $product->title= $request->title;
        $product->description= $request->description;
        $product->price=$request->price;
        $product->compare_price=$request->compare_price;
        $product->quantity=$request->quantity;
        $product->weight=$request->weight;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->status=$request->status;
        $product->images=$arr;
        $product->url_slug=Str::slug($request->seo_title);
        $product->save();
        Artisan::call('sitemap:generate');
        $this->ImageCrawler();
        return response()->json(['status'=>1,'notification'=>"Product Added Successfully"]);
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
        try {
            $product= Product::findOrFail($id)->first();
        } catch (\Exception $e) {
            $product=[];
        }

        return view('backend.products.edit', compact('product'));
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
        $this->validate($request, [
      'title' => 'required',
      'description' => 'required',
      'price' => 'required',
      'compare_price' => 'required',
      'quantity' => 'required',
      'weight' => 'required',
      'seo_title' => 'required|max:60|unique:products,seo_title,'.$id,
      'status' => 'required|integer',
      'seo_description' => 'required|max:160|unique:products,seo_description,'.$id,
      'files' => 'sometimes|required',
      'files.*' => 'image|mimes:jpg,jpeg,png'
       ]);

        $date = date_format(date_create(), 'Y-m-d');
        $images = $request->file('files');
        $x=1;

        if ($request->hasFile('files')) {
            $product=Product::findOrFail($id);

            foreach ($product->images as $img) {
                $image_path=public_path() . '/assets/frontend/images/product-detail/'.$img;
                // $slide_image_path=public_path() . '/assets/frontend/images/product-detail/slide_thumbnail/'.$img;
                // $swatch_image_path=public_path() . '/assets/frontend/images/product-detail/swatch_thumbnail/'.$img;
                if (file_exists($image_path)) {
                    unlink($image_path);
                    // unlink($slide_image_path);
                    // unlink($swatch_image_path);
                }
            }

            foreach ($images as $image) {
                if ($image->isValid()) {
                    $imageName =  Str::slug($request->seo_title).'-'.$date.'-00'.$x.'.'.strtolower($image->extension());

                    // Image::make($image->path())->save(public_path() . '/assets/frontend/images/product-detail/'.$imageName);
                    // Image::make($image->path())->resize(94, 132)->save(public_path() . '/assets/frontend/images/product-detail/slide_thumbnail/'.$imageName);
                    // Image::make($image->path())->resize(50, 50)->save(public_path() . '/assets/frontend/images/product-detail/swatch_thumbnail/'.$imageName);
                    $image->move(public_path() . '/assets/frontend/images/product-detail/', $imageName);

                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/'.$imageName);
                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/slide_thumbnail/'.$imageName);
                    // ImageOptimizer::optimize(public_path().'/assets/frontend/images/product-detail/swatch_thumbnail/'.$imageName);

                    $arr[] = $imageName;
                    $x++;
                }
            }
        } else {
            $arr= Product::findOrFail($id)->images;
        }

        $product = Product::find($id);
        $product->title= $request->title;
        $product->description= $request->description;
        $product->price=$request->price;
        $product->compare_price=$request->compare_price;
        $product->quantity=$request->quantity;
        $product->weight=$request->weight;
        $product->seo_title=$request->seo_title;
        $product->seo_description=$request->seo_description;
        $product->status=$request->status;
        $product->images=$arr;
        $product->url_slug=Str::slug($request->seo_title);
        $product->save();
        Artisan::call('sitemap:generate');
        $this->ImageCrawler();
        return response()->json(['status'=>1,'notification'=>"Product Updated Successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);

        foreach ($product->images as $img) {
            $image_path=public_path() . '/assets/frontend/images/product-detail/'.$img;
            $slide_image_path=public_path() . '/assets/frontend/images/product-detail/slide_thumbnail/'.$img;
            $swatch_image_path=public_path() . '/assets/frontend/images/product-detail/swatch_thumbnail/'.$img;
            if (file_exists($image_path) && file_exists($slide_image_path) && file_exists($swatch_image_path)) {
                unlink($image_path);
                unlink($slide_image_path);
                unlink($swatch_image_path);
            }
        }

        $product->delete();
        $this->ImageCrawler();
        return response()->json(['status'=>1,'notification'=>"Product deleted successfully"]);
    }

    public function summernoteImageUpload(Request $request)
    {
        $image= $request->file('file');
        $imageName =  time().'_'.$image->getClientOriginalName();
        $image->move(public_path() . '/assets/frontend/images/product-detail/content/', $imageName);
        return request()->root().'/assets/frontend/images/product-detail/content/'.$imageName;
    }
    public function ImageCrawler()
    {
        try {
            $imageDir = public_path('assets/frontend/images/product-detail/content');
            foreach (scandir($imageDir) as $path) {
                if (!is_dir($imageDir . '/' . $path)) {
                    $image_path=public_path() . '/assets/frontend/images/product-detail/content/'.$path;
                    if (!Product::where('description', 'like', '%'.$path.'%')->count()) {
                        unlink($image_path);
                    }
                }
            }
        } catch (\Exception $e) {
        }
    }

    public function list()
    {
        $list=Product::orderBy('created_at', 'desc')->get();
        return view('backend.products.list', compact('list'));
    }
}
