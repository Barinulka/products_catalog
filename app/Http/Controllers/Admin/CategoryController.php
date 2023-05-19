<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() 
    {

        // $categories = Category::get();
        $categories = Category::paginate(10);

        return view('admin.category.index', compact('categories'));
    }

    public function create() 
    {
        return view('admin.category.form');
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
        ]);

        $category = new Category();
        $category->name = $request->name;

        if ($request->published) {
            $category->is_published = 1;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Категория успешно добавлена');
    }

    public function edit(Category $category) 
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category) 
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
        ]);
       
        $category->name = $request->name;

        $category->is_published = 0;

        if ($request->published) {
            $category->is_published = 1;
        }

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Категория успешно обновлена');
        
    }

     
    public function destroy(int $id)
    {
        Category::destroy($id);
        return redirect()->route('categories.index')->with('success', 'Категория успешно удалена');
    }
}
