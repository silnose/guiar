<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{

    use Uuids;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $fillable = [
        'name',
    ];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];


    /* Mutators */

    public function getNameAttribute($name){

        return ucwords($name);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

}