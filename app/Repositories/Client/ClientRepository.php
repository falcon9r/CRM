<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 21.01.2023
 * Time: 15:34
 */

namespace App\Repositories\Client;


use App\Http\Filters\Client\ClientFilter;
use App\Models\Client;

class ClientRepository implements ClientContract
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function clients($data)
    {
        $filter = app()->make(ClientFilter::class , ['queryParams' => array_filter($data)]);
        return $this->client->filter($filter)->get();
    }
}