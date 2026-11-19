<?php

namespace Firewwdev\CurlPhpLib;

use CurlHandle;

class cURL
{

    public function curl(
        string $method, // -> Método HTTP que será executado
        string $url, // URL que a requisição será executada
        string | null $params = null, // Parâmetros da requisição
        array | string | null $valor = null // Corpo da requisição, $valor = null se não tiver corpo
    ) // -> Método princial da biblioteca
    {

        $curl = curl_init($url); // -> Inicializa a sessão no URL definido, retornando um objeto CurlHandle

        if($method === 'get'){

            $response = $this -> get($curl); // -> Resposta do método get()
            $formated_response = json_decode($response, true); // -> Transforma o retorno de get() em json
            
            return [
                'response' => $formated_response,
                'info' => $this -> getRequestInfo($curl)
            ];
            
        }else{
            return 'Método inválido.';
        }

    }

    private function get(CurlHandle $curl)
    {

        // curl_setopt() -> Configura uma opção para a requisição
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); // Configura o método da requisição

        $response = curl_exec($curl); // -> Executa a requisição e retorna uma resposta

        return $response;

    }

    private function post(CurlHandle $curl)
    {

        curl_setopt($curl, CURLOPT_POST, true);


    }

    private function getRequestInfo(CurlHandle $curl)
    {
        $response = curl_getinfo($curl); // -> Retorna uma info log de uma requisição

        return $response;
    }

}