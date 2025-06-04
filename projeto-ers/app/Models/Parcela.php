<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pagamento;

class Parcela extends Model
{
    protected $fillable = ['pagamento_id', 'qtde_parcelas', 'parcelas_pagas', 'valor_parcela'];

    public function pagamento(){
        return $this->belongsTo(Pagamento::class);
    }
}