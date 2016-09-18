<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Alert;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $data=[
            'categories' => $categories
        ];

        return view('dash.categories.index',$data);
    }

    public function create()
    {
        $categories = Category::all();

        $data=[
            'categories' => $categories
        ];

        return view('dash.categories.create',$data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        Category::create($request->all());

        Alert::success('Se creo el registro.', 'Excelente!');
        return redirect()->route('categories.index');
    }

    public function edit($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();

        $data=[
            'category' => $category
        ];

        return view('dash.categories.edit',$data);
    }

    public function update(Request $request,$uuid)
    {

        $category = Category::where('uuid',$uuid)->first();

        $this->validate($request, [
            'name' => 'required|unique:categories,id,'.$category->id
        ]);

        $category->update($request->all());

        Alert::success('Se actualizo el registro.', 'Excelente!');
        return redirect()->route('categories.index');
    }

    public function destroy($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();

        $category->delete();

        Alert::success('Se ha eliminado el registro.', 'Excelente!');
        return redirect()->route('categories.index');
    }


}
