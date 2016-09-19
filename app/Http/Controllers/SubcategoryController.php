<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Subcategory;
use Alert;

/**
 * Class SubcategoryController
 * @package App\Http\Controllers
 */
class SubcategoryController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listado de registros
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id','desc')
            ->paginate(config('guiar.paginate'));

        $data=[
            'subcategories' => $subcategories
        ];

        return view('dash.subcategories.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Crear vista
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $categories = Category::all();

        $data=[
            'subcategories' => $subcategories,
            'categories' => $categories
        ];

        return view('dash.subcategories.create',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Guardar registro
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:subcategories',
            'category_id' => 'required|integer'
        ]);

        Subcategory::create($request->all());

        Alert::success(config('guiar.msj.success_create_record'), config('success_title'));
        return redirect()->route('subcategories.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Editar vista
     */
    public function edit($uuid)
    {
        $subcategory = Subcategory::where('uuid',$uuid)->first();
        $categories = Category::all();

        if(!$subcategory){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('subcategories.index');
        }

        $data=[
            'subcategory' => $subcategory,
            'categories' => $categories
        ];

        return view('dash.subcategories.edit',$data);
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Actalizar registro
     */
    public function update(Request $request,$uuid)
    {
        $subcategory = Subcategory::where('uuid',$uuid)->first();

        if(!$subcategory){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('subcategories.index');
        }

        $this->validate($request, [
            'name' => 'required|unique:subcategories,id,'.$subcategory->id,
            'category_id' => 'required|integer'
        ]);

        $subcategory->update($request->all());

        Alert::success(config('guiar.msj.success_update_record'), config('success_title'));
        return redirect()->route('subcategories.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Eliminar registro
     */
    public function destroy($uuid)
    {
        $category = Subcategory::where('uuid',$uuid)->first();

        if(!$category){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('subcategories.index');
        }

        $category->delete();

        Alert::success(config('guiar.msj.success_delete_record'), config('success_title'));
        return redirect()->route('subcategories.index');
    }


}
