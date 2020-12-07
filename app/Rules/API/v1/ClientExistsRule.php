<?php

namespace App\Rules\API\v1;

use App\Models\Client;
use Illuminate\Contracts\Validation\Rule;

class ClientExistsRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $clients = Client::all()->pluck($attribute)->toArray();
        return in_array($value, $clients);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Client with id=:input not found.';
    }
}
