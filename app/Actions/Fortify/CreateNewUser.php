<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {

        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'type' => ['required' , 'string' , 'regex:(client|seller)'],
            'city' => ['required' , 'string' , 'regex:(agadir|casablanca|fes|marrakech|meknes|tanger|sale)'],
            'password' => $this->passwordRules(),            
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate(); 
        
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'type' => $input['type'],
            'city' => $input['city'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
