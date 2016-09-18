<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Category;
use Alert;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listado de registros
     */
    public function index()
    {
        $categories = Category::all();

        $data=[
            'categories' => $categories
        ];

        return view('dash.categories.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Crear vista
     */
    public function create()
    {
        $categories = Category::all();

        $data=[
            'categories' => $categories
        ];

        return view('dash.categories.create',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Guardar registro
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories',
        ]);

        Category::create($request->all());

        Alert::success(config('guiar.msj.success_create_record'), config('success_title'));
        return redirect()->route('categories.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Editar vista
     */
    public function edit($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();

        if(!$category){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('categories.index');
        }

        $data=[
            'category' => $category
        ];

        return view('dash.categories.edit',$data);
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Actalizar registro
     */
    public function update(Request $request,$uuid)
    {

        $category = Category::where('uuid',$uuid)->first();

        if(!$category){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('categories.index');
        }

        $this->validate($request, [
            'name' => 'required|unique:categories,id,'.$category->id
        ]);

        $category->update($request->all());

        Alert::success(config('guiar.msj.success_update_record'), config('success_title'));
        return redirect()->route('categories.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Eliminar registro
     */
    public function destroy($uuid)
    {
        $category = Category::where('uuid',$uuid)->first();

        if(!$category){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('categories.index');
        }

        $category->delete();

        Alert::success(config('guiar.msj.success_delete_record'), config('success_title'));
        return redirect()->route('categories.index');
    }


}
