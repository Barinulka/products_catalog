<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function index() 
    {

        $goods = Good::paginate(10);

        return view('admin.good.index', compact('goods'));
    }

    public function create() 
    {

        $cats = Category::where('is_published', 1);

        $categories = $cats->pluck('name', 'id');
        return view('admin.good.form', compact('categories'));
    }

    public function store(Request $request) 
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required',
            'category_id' => 'integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $image = $request->file('image')->store("images/{$folder}");
        }
        
        $good = new Good();
        $good->name = $request->name;
        $good->description = $request->description;
        $good->category_id = $request->category_id;
        $good->image = $image ?? null;

        if ($request->published) {
            $good->is_published = 1;
        }

        $good->save();

        return redirect()->route('goods.index')->with('success', 'Товар успешно создан');
    }

    public function edit(Good $good) 
    {
        $cats = Category::where('is_published', 1);

        $categories = $cats->pluck('name', 'id');
        return view('admin.good.edit', compact('good', 'categories'));
    }

    public function update(Request $request, Good $good) 
    {
        $this->validate($request, [
            'name' => 'required|min:5|max:100',
            'description' => 'required',
            'category_id' => 'integer',
            'image' => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            $folder = date('Y-m-d');
            $image = $request->file('image')->store("images/{$folder}");
        }
        
        $good->name = $request->name;
        $good->description = $request->description;
        $good->category_id = $request->category_id;
        $good->image = $image ?? null;

        $good->is_published = 0;

        if ($request->published) {
            $good->is_published = 1;
        }

        $good->save();

        return redirect()->route('goods.index')->with('success', 'Товар успешно обновлен');
        
    }

     
    public function destroy(int $id)
    {
        Good::destroy($id);
        return redirect()->route('goods.index')->with('success', 'Товар успешно удален');
    }
}
