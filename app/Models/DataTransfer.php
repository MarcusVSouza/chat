<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTransfer extends Model
{
    
    public $data;

    // public function __construct(){
    //     $this->data = $data;
    // }

    protected $fillable = ['data'];
}


