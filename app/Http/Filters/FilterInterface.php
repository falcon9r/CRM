<?php
/**
 * Created by PhpStorm.
 * User: falcon9r
 * Date: 21.01.2023
 * Time: 14:06
 */

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $builder);
}