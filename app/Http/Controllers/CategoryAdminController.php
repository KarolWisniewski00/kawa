<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAdminController extends Controller
{
    public function operationCommunicateByResult($res)
    {
        if ($res) {
            return redirect()->route('dashboard.shop.category')
                ->with('success', 'Operacja się powiodła.');
        } else {
            return redirect()->back()
                ->with('fail', 'Operacja się nie powiodła.');
        }
    }
    public function index()
    {
        return view('admin.shop.category.index', [
            'categories' => Category::paginate(20),
        ]);
    }
    public function create()
    {
        return view('admin.shop.category.create', [
            'categories' => Category::paginate(20),
        ]);
    }
    public function store(Request $request)
    {
        $res = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);

        return $this->operationCommunicateByResult($res);
    }
    public function edit(Category $category)
    {
        $categories = Category::paginate(20);
        return view('admin.shop.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $res = $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ]);
        return $this->operationCommunicateByResult($res);
    }
    public function delete(Category $category)
    {
        $res = $category->delete();
        return $this->operationCommunicateByResult($res);
    }
}
