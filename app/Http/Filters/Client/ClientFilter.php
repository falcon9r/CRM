<?php

namespace App\Http\Filters\Client;


use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ClientFilter extends AbstractFilter
{
    public const SEARCH = 'search';
    public const PHONE = 'phone';
    public const REGION_ID = 'region_id';
    public const USER_ID = 'user_id';

    protected function getCallbacks(): array
    {
        return [
            self::USER_ID => [$this , 'userId'],
            self::REGION_ID => [$this, 'regionId'],
            self::SEARCH => [$this , 'search']
        ];
    }

    public function search(Builder $builder , $value)
    {
        $builder->where(self::PHONE, 'LIKE' , "%{$value}%")
            ->orWhere(DB::raw("CONCAT(first_name, ' ' ,last_name)") , 'LIKE' , "%{$value}%");
    }


    public  function userId(Builder $builder , $value)
    {
        $builder->where('user_id', $value);
    }

    public function regionId(Builder $builder , $value)
    {
        $builder->where(self::REGION_ID , $value);
    }
}