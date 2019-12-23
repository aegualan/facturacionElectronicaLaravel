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



