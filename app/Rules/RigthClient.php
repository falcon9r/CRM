<?php

namespace App\Rules;

use App\Models\Client;
use Illuminate\Contracts\Validation\ImplicitRule;

class RightClient implements ImplicitRule
{

    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        $user_id = -1;
        try
        {
            $user_id = Client::query()->findOrFail($value)->user_id;
        }catch (\Exception $exception)
        {
            $user_id = -1;
        }
        return $user_id == auth()->id();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The user have not this client.';
    }
}
