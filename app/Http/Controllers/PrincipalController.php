<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MotivoContato;

class PrincipalController extends Controller
{
    public function principal () {
        $motivo = MotivoContato::all();

        return view('site.principal', ['motivo' => $motivo]);
    }
}
