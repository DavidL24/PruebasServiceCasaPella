<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function getUsuario($id)
    {
        $data = [
            'status' => 'success',
            'data' => [
                'first_name' => 'John',
                'last_name' => 'Smith',
                'id' => $id
            ]
        ];
        return response()->xml($data);
    }
}
