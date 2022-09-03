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
            'usuario' => ['required', 'string', 'min:4', 'max:100', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'nombre' => ['required', 'string', 'min:4', 'max:100'],
            /* 'cif' => ['string', 'max:10'],
            'direccion' => ['string', 'max:100'],
            'codigo_postal' => ['numeric', 'max:5'],
            'provincia' => ['string', 'max:50'],
            'municipio' => ['string', 'max:50'], */
        ])->validate();

        return User::create([
            'usuario' => $input['usuario'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'nombre' => $input['nombre'],
            'cif' => $input['cif'],
            'direccion' => $input['direccion'],
            'codigo_postal' => $input['codigo_postal'],
            'provincia' => $input['provincia'],
            'municipio' => $input['municipio'],
        ]);
    }
}
