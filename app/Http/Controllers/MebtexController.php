<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

class MebtexController extends Controller
{
    public function index()
    {

      $page = $_GET["page"] ?? 1;
      
      $url = 'http://mebtex.com.ua/catalog/page'.$page;

      $client = new Client();

      $response = $client->request('GET', $url);

      $response_status_code = $response->getStatusCode();

      $html = $response->getBody()->getContents();

      if($response_status_code == 200){

      $dom = HtmlDomParser::str_get_html($html);

      $products = $dom->find('li[class="product"]');

      foreach($products as $product){

      	$title = $product->find('div[class="product-details"]', 0)->find('h3',0)->text();
      	$main_img = $product->find('div[class="product-image"]', 0)->find('img',0)->src;

      	$objects[] = (object) [
            "title" => $title,
            "main_img" => $main_img,
          ];
      	}

      }
      
      return response()->json($objects);
    }
}
