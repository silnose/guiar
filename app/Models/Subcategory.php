<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model{

    use Uuids;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'category_id',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    /* belongsTo */

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /* belongsToMany */

    public function companies()
    {
        return $this->belongsToMany(Company::class, 'companies_subcategories', 'company_id', 'subcategory_id');
    }
}