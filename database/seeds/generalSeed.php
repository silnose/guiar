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
            'comercial'=>[
                'aberturas',
                'alarmas',
                'automotores',
                'cabañas'
            ],
            'profesional'=>[
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

        $categoryArray=[];
       foreach($objects as $var){

           $categoryArray['name']=$var;

           $category = (new Category())->create($categoryArray);
           
           
       }



        foreach($categories as $category){

            foreach($subcategories as $subcategory){

                if($ca)
            }
        }
    }
}
