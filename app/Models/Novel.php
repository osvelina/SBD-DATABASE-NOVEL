<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Novel extends Model
{
    use HasFactory;
    use SoftDeletes;
        /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     * 
     */
    protected $table = 'novel';
    protected $dates = ['deleted_at'];

  
    protected $guarded = [];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
