<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Company;
use Alert;

/**
 * Class CompanyController
 * @package App\Http\Controllers
 */
class CompanyController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Listado de registros
     */
    public function index()
    {
        $companies = Company::orderBy('id','desc')
            ->paginate(config('guiar.paginate'));

        $data=[
            'companies' => $companies
        ];

        return view('admin.companies.index',$data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Crear vista
     */
    public function create()
    {
        $companies = Company::all();
        $subcategories = Subcategory::all();

        $data=[
            'companies' => $companies,
            'subcategories' =>$subcategories,
        ];

        return view('admin.companies.create',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Guardar registro
     */
    public function store(Request $request)
    {
        $storeArray = $request->all();

        $this->validate($request, [
            'name' => 'required|unique:companies',
            'subcategory_id' => 'required|integer',
        ]);

        $company = Company::create($storeArray);
        $company->subcategories()->attach($storeArray['subcategory_id']);

        Alert::success(config('guiar.msj.success_create_record'), config('success_title'));
        return redirect()->route('companies.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * Editar vista
     */
    public function edit($uuid)
    {
        $company = Company::where('uuid',$uuid)->first();
        $subcategories = Subcategory::all();

        if(!$company){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('companies.index');
        }

        $data=[
            'company' => $company,
            'subcategories' =>$subcategories,
        ];

        return view('admin.companies.edit',$data);
    }

    /**
     * @param Request $request
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Actalizar registro
     */
    public function update(Request $request,$uuid)
    {
        $updateArray = $request->all();

        $company = Company::where('uuid',$uuid)->first();

        if(!$company){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('companies.index');
        }

        $this->validate($request, [
            'name' => 'required|unique:companies,id,'.$company->id,
            'subcategory_id' => 'required|integer'
        ]);

        $company->update($updateArray);
        $company->subcategories()->detach($company->subcategory_id);
        $company->subcategories()->attach($updateArray['subcategory_id']);

        Alert::success(config('guiar.msj.success_update_record'), config('success_title'));
        return redirect()->route('companies.index');
    }

    /**
     * @param $uuid
     * @return \Illuminate\Http\RedirectResponse
     * Eliminar registro
     */
    public function destroy($uuid)
    {
        $company = Company::where('uuid',$uuid)->first();

        if(!$company){
            Alert::error(config('guiar.msj.fail_record_not_found'), config('fail_title'));
            return redirect()->route('companies.index');
        }

        $company->delete();

        Alert::success(config('guiar.msj.success_delete_record'), config('success_title'));
        return redirect()->route('companies.index');
    }


}
