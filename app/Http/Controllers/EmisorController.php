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

//        if($consulta->count()>0){
//            
//            return back()->with('flash', 'Actualizar');
//        }else{
//           // return back()->with('flash', 'Guardados');
//        }
        // return back()->with('flash', 'Actualizar');
//        $emisor = new Emisor();
//        $this->cargarObjeto($request, $emisor);
//        if ($emisor->save()) {
//            return back()->with('flash', 'Datos Guardados');
//        }
        if (Emisor::first()->count() > 0) {
            return 'actualizar';
        } else {
            $emisor = new Emisor();
            $this->cargarObjeto($request, $emisor);
            if ($emisor->save()) {
                return back()->with('flash', 'Datos Guardados');
            }
        }
    }

    private function cargarObjeto($request, $emisor) {

        $this->validar($request);
        //return $request['ruc'];
        $emisor->rucEmisor = formatoWeb($request['ruc'], 'N');
        $emisor->razonSocialEmisor = formatoWeb($request['razonSocial'], "S");
        $emisor->nombreComercialEmisor = formatoWeb($request['nombreComercial'], "S");
        $emisor->direccionMatrizEmisor = formatoWeb($request['direccionMatriz'], "S");
        $emisor->direccionEstablecimientoEmisor = formatoWeb($request['direccionEstablecimiento'], "S");
        $emisor->codigoEstablecimientoEmisor = formatoWeb($request['codigoEstablecimiento'], "N");
        $emisor->codigoPuntoEmisionEmisor = formatoWeb($request['codigoPuntoEmision'], "N");
        $obliCont = 'N';
        if ($request['oblLlevarCont'] == "on") {
            $obliCont = 'S';
        }

        //obtenemos el campo file definido en el formulario
        $file = $request->file('logo');
        $nombre = null;
        if (!empty($file)) {

            $nombre = str_replace(' ', '', formatoWeb($file->getClientOriginalName(), "S"));
            \Storage::disk('local')->put($nombre, \File::get($file));
        }
        $emisor->llevarContabilidadEmisor = $obliCont;
        $emisor->pathLogoEmisor = formatoWeb($nombre, "S");
    }

    private function validar($request) {
        $this->validate($request, [
            'ruc' => 'required|min:13|integer',
            'razonSocial' => 'required',
            'codigoEstablecimiento' => 'required|min:3',
            'codigoPuntoEmision' => 'required|min:3',
            'direccionMatriz' => 'required|min:5',
            'direccionEstablecimiento' => 'required|min:5',
        ]);
    }

}
