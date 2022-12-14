<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;

class CategoryController extends Controller
{

    private $category;

    public  function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getHtmlOption($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $htmlOption = $this->getHtmlOption($parentId = '');
        return view('category.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->category_name),
        ]);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->find($id);

        $htmlOption = $this->getHtmlOption($category->parent_id);

        return view('category.edit',compact('category', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request->category_name,
            'parent_id' => $request->parent_id,
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
