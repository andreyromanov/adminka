<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();

        $url = 'http://mebtex.com.ua/catalog/';
        
        // Создаем дескриптор cURL
        $ch = curl_init();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );

        // Запускаем
          $http_respond = curl_exec($ch);
          
          $http_code = curl_getinfo( $ch, CURLINFO_HTTP_CODE );

        // Закрываем дескриптор
        curl_close($ch);

        if ( ( $http_code == "200" ) ) {
            $mebtex = 'ok';
          } else {
            $mebtex = 'not working';
          }

        return view('welcome', compact('products', 'categories', 'mebtex'));
    }
}
