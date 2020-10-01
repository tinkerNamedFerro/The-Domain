<?php
namespace App;
use GuzzleHttp;
use Eastwest\Json\Json;
use Eastwest\Json\JsonException;
// apikeyaccess213123
// yolin69590@mimpi99.com
// sdasddfrsdfsdfsd2323sad12
class Image {
    public function upload_image($image){
        $client = new GuzzleHttp\Client();
        $image = substr($image,strpos($image,"base64,")+7);
        $headers = ['Content-Type' => 'multipart/form-data;'];
        $body = ['image' => $image ];
        $res = $client->post('https://api.imgbb.com/1/upload?key=532610cb55de084fd2af9a0bbdd4949c', [
            GuzzleHttp\RequestOptions::FORM_PARAMS => $body // or 'json' => [...]
        ]);
        if ($res->getStatusCode() == "200"){
            try {
                $response = json_decode($res->getBody()->getContents(), true); // GET response body
                $image_url = $response["data"]["image"]["url"]; // Isolate sentence sentiment
                return($image_url);
            } catch (EncodeDecode $e) {
                die("Something has gone wrong, invalid query or result: $e");
            }
        }
    }
}