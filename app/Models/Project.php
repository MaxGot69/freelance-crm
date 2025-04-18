<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    //Какие массово заполнять поля 
    protected $fillable = ['title', 'description', 'status', 'deadline'];

    public function client(){
        return $this->belongsTo(Client::class);
            }
//Многие к одному
    public function invoices(){
      return  $this->hasMany(Invoice::class);
    }
}
