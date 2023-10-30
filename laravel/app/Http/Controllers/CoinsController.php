<?php

namespace App\Http\Controllers;

use App\Services\CoinService;

class CoinsController extends Controller
{

    public $coins;
    public $coinServices;

    public function __construct(CoinService $coinServices)
    {
        $this->coinServices = $coinServices;

    }
    public function index()
    {

        return view('coins', ['coins' => $this->coinServices->receiveCoins()]);
    }


    public function getCoins()
    {
        $this->coinServices->getCoinsApi();

        return redirect('/');
    }

}
