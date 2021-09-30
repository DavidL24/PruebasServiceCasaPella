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

    public function postUsuario(Request $request)
    {
        $xml= $request->getContent();

        $parse = $this->xmlToArray($xml);

        $data = [
            'status' => 'success',
            'data' => [
                'first_name' => $parse['data']['first_name'],
                'last_name' => $parse['data']['last_name'],
                'id' => $parse['data']['id']
            ]
        ];
        return response()->xml($data);
    }

    public function xmlToArray($xmlstring){
    
        $xml = simplexml_load_string($xmlstring, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
      
        return $array;
      
      }
}
