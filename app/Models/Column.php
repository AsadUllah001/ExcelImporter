<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
    protected $fillable = ['file_id', 'name'];

    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function rows()
    {
        return $this->hasMany(Row::class);
    }
}
