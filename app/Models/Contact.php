<?php

namespace App\Models;

use App\Models\User; // Adicione esta linha para importar o modelo User
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'type', 'notes', 'user_id']; 
    // Adicione 'user_id' à lista de atributos preenchíveis

    public function user() //Associação com o modelo User
    {
        return $this->belongsTo(User::class);
    }
}