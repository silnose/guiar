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
        return $this->belongsToMany(Company::class, 'companies_subcategories', 'subcategory_id', 'company_id');
    }
    
}

