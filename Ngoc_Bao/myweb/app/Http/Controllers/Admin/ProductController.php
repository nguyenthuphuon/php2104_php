<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    protected $modelProduct;
    protected $modelCategory;

    public function __construct(Product $product, Category $category)
    {
        $this->modelProduct = $product;
        $this->modelCategory = $category;
    }

    public function index()
    {
        //return view get data
        $products = $this->modelProduct->paginate(10);
        $user = \Auth::user();
        return view('admin.products.index',[
            'products'=>$products,
            'user' => $user
        
        ]);
    }


    public function create()
    {
        $categories = $this->modelCategory::all();
        $user = \Auth::user();
        return view('admin/products.create',[
            'categories' => $categories,
            'user' => $user
        ]);
    }


    public function store(Request $request)
    {
        $data = $data = $request->only([
            'category_id',
            'name',
            'description',
            'price',
            'quantity',
            'sale_off',
            'is_public',
        ]);

        $data['category_id'] = (int) $data['category_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        $data['user_id'] = auth()->id();

        
        try {
            $product = $this->modelProduct->create($data);
            $msg = 'Create product success.';

            return redirect()
                ->route('products.show', ['product' => $product->id])
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('products.index')
            ->with('error', $error);
    }


    public function show($id)
    {
        $user = \Auth::user();
        $product = $this->modelProduct->findOrFail($id);

        return view('admin.products.show',[
            'product'=>$product,
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $product = $this->modelProduct->findOrFail($id);
        $categories = $this->modelCategory->all();
        $user = \Auth::user();

        return view('admin.products.edit',[
            'product'=>$product,
            'categories'=>$categories,
            'user' => $user
        ]);
    }


    public function update(Request $request, $id)
    {
        $product = $this->modelProduct->findOrFail($id);
        
        $data = $data = $request->only([
            'category_id',
            'name',
            'description',
            'price',
            'quantity',
            'sale_off',
            'is_public',
        ]);

        $data['category_id'] = (int) $data['category_id'];
        $data['is_public'] = isset($data['is_public']) ? (int) $data['is_public'] : 0;
        //$data['user_id'] = auth()->id();
        $data['user_id'] = $product->user_id;

       

        try {
            $product->update($data);
            $msg = 'update product success.';

            return redirect()
                ->route('products.index')
                ->with('msg', $msg);
        } catch (\Exception $e) {
            \Log::error($e);
        }

        $error = 'Something went wrong.';

        return redirect()
            ->route('products.index')
            ->with('error', $error);
    }


    public function destroy($id)
    {
        $product = $this->modelProduct->findOrFail($id);
        $msg = '';

        try {
            $product->delete();
            $msg = 'Delete Success';
            return redirect()
            ->route('products.index')
            ->with('msg',$msg)
            ;
        } catch (\Exception $e) {
            \Log::error($e);
            
        }
        $error = 'Some thing went wrong. delete fail';
        return redirect()
            ->route('products.index')
            ->with('error',$error)
            ;
    }
}
