<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            //'usuario' => ['string', 'min:4', 'max:100', 'unique:users', Rule::unique('users')->ignore($user->id)],
            'email' => ['email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'nombre' => ['string', 'min:4', 'max:100'],
            /* 'cif' => ['required', 'string', 'min:9', 'max:10'],
            'direccion' => ['string', 'min:20', 'max:100'],
            'codigo_postal' => ['numeric', 'min:5'],
            'provincia' => ['string', 'min:6', 'max:50'],
            'municipio' => ['string', 'min:6', 'max:50'], */
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'usuario' => $input['usuario'],
                'email' => $input['email'],
                'nombre' => $input['nombre'],
                'cif' => $input['cif'],
                'direccion' => $input['direccion'],
                'codigo_postal' => $input['codigo_postal'],
                'provincia' => $input['provincia'],
                'municipio' => $input['municipio'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'usuario' => $input['usuario'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'nombre' => $input['nombre'],
            'cif' => $input['cif'],
            'direccion' => $input['direccion'],
            'codigo_postal' => $input['codigo_postal'],
            'provincia' => $input['provincia'],
            'municipio' => $input['municipio'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
