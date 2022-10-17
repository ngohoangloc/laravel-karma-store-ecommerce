<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Traits;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    use Traits\StorageImageTrait;

    private $category;
    private $product;
    private $tag;
    private $productImage;
    private $productTag;

    public  function __construct(Category $category ,Product $product ,Tag $tag ,ProductTag $productTag ,ProductImage $productImage)
    {
        $this->category = $category;
        $this->product = $product;
        $this->tag = $tag;
        $this->productTag = $productTag;
        $this->productImage = $productImage;
    }

    public function index(){
        $products = $this->product->latest()->simplePaginate(5);
        return view('product.index',compact('products'));
    }
    public function create(){
        $htmlOption = $this->getHtmlOption($parentId = '');
        return view('product.create', compact('htmlOption'));
    }

    public function getHtmlOption($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store (ProductRequest $request){

        try {
            DB::beginTransaction();
            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,

                'user_id' => 1, // thay bằng hàm auth()->id() lấy id của người đang đăng nhập vào hệ thống để thêm sản phẩm

                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path','product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];

            }
            $product = $this->product->create($dataProductCreate);

            //Insert to product_images
            if ($request->hasFile('image_path')){
                foreach ($request->image_path as $fileItiem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItiem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }
            //Insert tag for product
            if(!empty($request->tags)){
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagID[] = $tagInstance->id;

                }
            }
            $product->tags()->attach($tagID);
            DB::commit();
            return redirect()->route('product.index');
        }catch (\ErrorException $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function edit($id){
        $product = $this->product->find($id);
        $htmlOption = $this->getHtmlOption($product->category_id);
        return view('product.edit',compact('htmlOption','product'));
    }

    public function update(Request $request , $id){
        try {
            DB::beginTransaction();
            $dataProductupdate= [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,

                'user_id' => 1, // thay bằng hàm auth()->id() lấy id của người đang đăng nhập vào hệ thống để thêm sản phẩm

                'category_id' => $request->category_id
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request ,'feature_image_path','product');
            if(!empty($dataUploadFeatureImage)){
                $dataProductupdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductupdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];

            }
            $this->product->find($id)->update($dataProductupdate);
            $product = $this->product->find($id);

            //Insert to product_images
            if ($request->hasFile('image_path')){
                $this->productImage->where('product_id',$id)->delete();
                foreach ($request->image_path as $fileItiem){
                    $dataProductImageDetail = $this->storageTraitUploadMultiple($fileItiem,'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }
            //Insert tag for product
            if(!empty($request->tags)){
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagID[] = $tagInstance->id;

                }
            }
            $product->tags()->sync($tagID);
            DB::commit();
            return redirect()->route('product.index');
        }catch (\ErrorException $exception){
            DB::rollBack();
            Log::error('Message' . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->getHtmlOption($product->category_id);
        return view('product.delete',compact('htmlOption','product'));
    }

    public function destroy($id)
    {
        $this->product->find($id)->delete();
        return redirect()->route('product.index');
    }
}
