<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emisor extends Model
{
    protected $table = 'tblEmisor';
    protected  $primaryKey = 'rucEmisor';
    public $timestamps = false;
}
