<?php

namespace App\Http\Controllers;
use OpenApi\Attributes as OA;

#[OA\Info(
    title: "API Dragon Ball FCT",
    version: "1.0.0",
    description: "Documentación oficial de la API. ¡Siente el Ki!"
)]
#[OA\Server(
    url: "http://api-dragon-ball-fct.test",
    description: "Servidor Local"
)]
abstract class Controller
{
    //
}
