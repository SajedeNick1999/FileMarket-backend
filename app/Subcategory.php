<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table='subcategories';
    protected $primaryKey=['id'];
    //protected $fillable=[];
    protected $guarded=[
    ];
    protected $hidden = [
    ];
}
