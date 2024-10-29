<?php

namespace Vimeo\Upload;

use TusPhp\Tus\Client;

class TusClientFactory
{
    /**
     * @param string $base_uri The fully qualified domain of the upload, ex: https://us-files.tus.vimeo.com
     * @param string $url The fully qualified url of the upload, ex: https://us-files.tus.vimeo.com/files/vimeo-a1b2c3d4
     * @return Client
     */
    public function getTusClient(string $base_uri, string $url, $options) : Client
    {
        $proxy = config('mediateca.app_proxy').":".config('mediateca.app_proxy_port');

        $options = [
            'headers' => [
                // Tus encabezados personalizados aquí
            ],
            'proxy' => $proxy, // Reemplaza con tu configuración de proxy
            'verify' => false, // O true, dependiendo de si deseas verificar los certificados
        ];

        $client = new TusClient($base_uri, $options);
        $client->setUrl($url);
        return $client;
    }
}