<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = ['project_id', 'client_id', 'amount', 'status', 'due_date'];

    public function project(){
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    

}
