<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class generalSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $objects = [

                'comercial' => [
                    'aberturas',
                    'alarmas',
                    'automotores',
                    'cabañas'
                ],
                'profesional' => [
                    'abogados',
                    'contadores',
                    'escribanias',
                    'arquitectos',
                    'agrimensores',
                ],
                'salud' => [
                    'acupuntura',
                    'bioquimicos',
                    'cardiologia',
                    'cirugia',
                    'demartologia',
                    'enfermerias'
                ]

            ];

            Company::truncate();
            Category::truncate();
            Subcategory::truncate();


            foreach ($objects as $category=>$subcategories) {

                $categoryArray = [
                    'name' => $category,
                ];

                $categoyModel = (new Category())->create($categoryArray);

                foreach($subcategories as $subcategory){

                    $subCategoryArray = [
                        'name' => $subcategory,
                        'category_id' => $categoyModel->id,
                    ];

                    $subcategoryModel = (new Subcategory())->create($subCategoryArray);
                }
            }


            $companies = factory(Company::class, 50)->create();


            foreach($companies as $company){

                $subcategories = Subcategory::select('id')->pluck('id')->toArray();



                $subcategoriesArray= array_rand($subcategories, 2);


                $company->subcategories()->attach($subcategoriesArray);
            }
    }
}
