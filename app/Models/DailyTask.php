<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DailyTask extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['title', 'description', 'status'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
    public function getRouteKeyName()
    {
        return 'id'; // Laravel uses this field for model binding
    }
}
