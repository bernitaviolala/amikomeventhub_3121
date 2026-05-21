<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $categories = Category::where('name', 'LIKE', '%' . $search . '%')
                        ->latest()
                        ->get();

        return view('admin.categories.index', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name'
        ], [
            'name.required' => 'Nama kategori wajib diisi',
            'name.unique' => 'Kategori sudah ada'
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('admin.categories.index')
                         ->with('success', 'Kategori berhasil diupdate');
    }

    public function edit(Category $category)
{
    return view('admin.categories.edit', compact('category'));
}
   public function destroy(Category $category)
{
    $category->delete();

    return redirect('/admin/categories')
            ->with('success', 'Kategori berhasil dihapus');
}
}
