<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;
use Session;

class DemoController extends Controller
{
    public function index()
    {
        $data = ['name' => 'Surawut',
                'lastname' => 'Sodasak'
            ];

        echo formatName($data);

        /*$data = array('products' => array(
                        'desk' => array('price' => 100)
                    )
                );*/
        //$data = ['products' => ['desk' => ['price' => 100]]];
        /*$price = data_get($data, 'products.desk.price');

        echo $price;*/


        //Cookie::make('name', 'Hello', 360);
        //echo ">>".Cookie::get('name')."<<";

        //setcookie('name', 'some value', time()+60*60*24*365);
        //dd($_COOKIE['name']);
        //
        //return view('test');
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }

    public function demothree()
    {
        //session(['key' => 'value']);
        //echo "Key: ".session('key');
        Session::put('key', 'valuexx');

        echo "Key: ".Session::get('key');

        //return "Method GET, POST : demothree";
    }

    public function demofour()
    {
        return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }

}
