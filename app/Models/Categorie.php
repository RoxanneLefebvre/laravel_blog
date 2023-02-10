<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function selectCategorie(){
        $query = Categorie::select()
        ->orderby('categorie')
        ->get();
        return $query;
    }
}
