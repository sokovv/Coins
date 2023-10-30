<?php

namespace App\Services;

use App\Models\Coins;
use Illuminate\Support\Facades\Http;

class CoinService
{
    public $coins;
    public function receiveCoins(): mixed
    {
        if (Coins::exists() === true) {
            $this->coins = Coins::simplePaginate(100);
        }
        return $this->coins;
    }

    public function getCoinsApi()
    {
        $response = Http::withHeaders([
            'Accepts: application/json',
            'X-CMC_PRO_API_KEY' => ' 01e30a04-633a-4df8-8b98-642e145d39cc',
        ])->get('pro-api.coinmarketcap.com/v1/cryptocurrency/map?start=1&limit=5000');

        $jsonData = $response->json()['data'];
        foreach ($jsonData as $value) {

            $coin = [
                'name' => $value['name'],
                'rank' => $value['rank'],
                'symbol' => $value['symbol'],
                'slug' => $value['slug'],
                'is_active' => $value['is_active'],
                'first_historical_date' => $value["first_historical_data"],
                'last_historical_date' => $value["last_historical_data"],
                'platform' => $value['platform'],
            ];
            if (Coins::where('name', $value['name'])->exists()) {

            } else {
                Coins::class::create($coin);
            }
        }
    }
}
