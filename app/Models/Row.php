<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'file_id'];
    public function Column()
    {
        return $this->belongsTo(Column::class);
    }
}
