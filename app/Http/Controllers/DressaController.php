<?php

namespace App\Http\Controllers;

use App\Dressa;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use GuzzleHttp\Client;
use Sunra\PhpSimple\HtmlDomParser;

class DressaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $url = 'https://dressa.com.ua/p/velvetovoe-plate-rubashka-bezhevoe-44859';

      $client = new Client();

      $response = $client->request('GET', $url);

      $response_status_code = $response->getStatusCode();

      $html = $response->getBody()->getContents();

      if($response_status_code == 200){

      $dom = HtmlDomParser::str_get_html($html);

      }
      
      return $dom;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dressa  $dressa
     * @return \Illuminate\Http\Response
     */
    public function show(Dressa $dressa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dressa  $dressa
     * @return \Illuminate\Http\Response
     */
    public function edit(Dressa $dressa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dressa  $dressa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dressa $dressa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dressa  $dressa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dressa $dressa)
    {
        //
    }
}
