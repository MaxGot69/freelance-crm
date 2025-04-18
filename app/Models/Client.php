<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    //Какие поля массово заполнять
    protected $fillable = ['name', 'emaile', 'phone', 'notes'];

    // Связь один ко многим
    public function projects(){
        return $this->hasMany(Project::class);
    }

    }
    


