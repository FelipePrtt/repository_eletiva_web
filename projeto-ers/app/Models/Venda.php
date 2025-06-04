<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Compra;
use App\Models\Cliente;

class Venda extends Model
{
    protected $fillable = ['cliente_id', 'pagamento', 'total'];
    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
