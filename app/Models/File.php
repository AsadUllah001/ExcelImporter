<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'path'];
    public function columns()
    {
        return $this->hasMany(Column::class)->with('rows:id,value,column_id');
    }
    public function rows()
    {
        return $this->hasManyThrough(Row::class, Column::class);
    }
}
