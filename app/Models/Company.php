<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model{

    use Uuids;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
        'address',
        'phone',
        'facebook',
        'twitter',
        'web',
        'email',
        'description',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /* belongsToMany */

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class, 'companies_subcategories', 'company_id', 'subcategory_id');
    }

    /* Mutators */

    public function getNameAttribute($name){

        return ucwords($name);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
    
}

