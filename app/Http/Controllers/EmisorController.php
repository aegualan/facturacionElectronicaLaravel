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
           'ruc'=>'required|min:13|integer',
            'razonSocial'=>'required',
            'codigoEstablecimiento'=>'required|min:3',
            'codigoPuntoEmision'=>'required|min:3',
            'direccionMatriz'=>'required|min:5',
            'direccionEstablecimiento'=>'required|min:5',
        ]);
        
        //return $request['ruc'];
        
        $emisor = new Emisor();
        $emisor->rucEmisor = formatoWeb($request['ruc'],'N');
        $emisor->razonSocialEmisor = formatoWeb($request['razonSocial'],"S");
        $emisor->nombreComercialEmisor = formatoWeb($request['nombreComercial'],"S");
        $emisor->direccionMatrizEmisor = formatoWeb($request['direccionMatriz'],"S");
        $emisor->direccionEstablecimientoEmisor = formatoWeb($request['direccionEstablecimiento'],"S");
        $emisor->codigoEstablecimientoEmisor = formatoWeb($request['codigoEstablecimiento'],"N");
        $emisor->codigoPuntoEmisionEmisor = formatoWeb($request['codigoPuntoEmision'],"N");
        $obliCont = 'N';
        if($request['oblLlevarCont']=="on"){
            $obliCont = 'S';
        }
        
          //obtenemos el campo file definido en el formulario
       $file = $request->file('logo');
 
       //obtenemos el nombre del archivo
       $nombre = str_replace(' ', '', formatoWeb($file->getClientOriginalName(), "S"));
        
        
         $emisor->llevarContabilidadEmisor = $obliCont;
         $emisor->pathLogoEmisor = $nombre;
         $emisor->save();
      
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));
 
       return "archivo guardado";
       // return 'GUARDADO';
    }

}
