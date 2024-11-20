<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name', 'summary', 'authors', 'advisor', 'file_path', 'url', 'type', 'center', 'program'];

    protected $casts = [
        'authors' => 'array', // Para manejar el JSON de los autores
    ];
    

}

