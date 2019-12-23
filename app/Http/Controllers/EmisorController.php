<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emisor;
//use Illuminate\Http\Request;
class EmisorController extends Controller {

    public function index() {
        $datos['emisor'] = Emisor::first();
        $datos['activoMP'] = 'active';
        return view('admin.emisor.create', $datos);
    }
    
    public function store(Request $request) {
        $this->validate($request, [
           'ruc'=>'required|min:13',
            'razonSocial'=>'required',
            'codigoEstablecimiento'=>'required|min:3',
            'codigoPuntoEmision'=>'required|min:3'
        ]);
        
        return 'validando';
    }

}
