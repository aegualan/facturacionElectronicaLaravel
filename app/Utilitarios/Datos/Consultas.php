<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consultas
 *
 * @author Angel Eduardo Gualan
 */
//use Auth;
use Illuminate\Support\Facades\DB;
class Consultas {
    //put your code here
    
    function getUserName(){
        if (Auth::user()) {
            $userName = DB::table('tblPersonas')->where('codPersona', Auth::user()->codPersona)->first();
            if($userName!=null){
                return $userName->nombrePersona;
            }else{
                return 'USUARIO NO IDENTIFICADO';
            } 
        }
    }
}
