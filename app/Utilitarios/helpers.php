<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Datos/Consultas.php';
function getUserName(){
    $datos = new Consultas();
    return $datos->getUserName();
}

function isActive($url){
    return request()->routeIs($url) ? 'active':'';
}

function  formatoWeb($valor,$tipoDatos){
    $valorFormateado = '';
    switch ($tipoDatos){
        case 'S':
            if(empty($valor)){
               $valorFormateado = '*';
            }else{
              $valorFormateado =  mb_strtoupper($valor,'utf-8');
            }
            break;
        case 'N':
            if(empty($valor)){
               $valorFormateado = '0';
            }else{
              $valorFormateado =  $valor;
            }
            break;
            
    }
    
    return $valorFormateado;
}



