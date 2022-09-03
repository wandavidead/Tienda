<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Usuario -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="usuario" value="{{ __('Usuario') }}" />
            <x-jet-input id="usuario" type="text" class="mt-1 block w-full" wire:model.defer="state.usuario" autocomplete="usuario" />
            <x-jet-input-error for="usuario" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
        
        <!-- Nombre -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="state.nombre" autocomplete="nombre" />
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>

        <!-- CIF -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cif" value="{{ __('Código de identificación fiscal (CIF)') }}" />
            <x-jet-input id="cif" type="text" class="mt-1 block w-full" wire:model.defer="state.cif" autocomplete="cif" />
            <x-jet-input-error for="cif" class="mt-2" />
        </div>
        
        <!-- Direccion -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="direccion" value="{{ __('Direccion') }}" />
            <x-jet-input id="direccion" type="text" class="mt-1 block w-full" wire:model.defer="state.direccion" autocomplete="direccion" />
            <x-jet-input-error for="direccion" class="mt-2" />
        </div>

        <!-- Codigo Postal -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="codigo_postal" value="{{ __('Codigo Postal') }}" />
            <x-jet-input id="codigo_postal" type="text" class="mt-1 block w-full" wire:model.defer="state.codigo_postal" autocomplete="codigo_postal" />
            <x-jet-input-error for="codigo_postal" class="mt-2" />
        </div>
        
        <!-- Provincia -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
            <x-jet-input id="provincia" type="text" class="mt-1 block w-full" wire:model.defer="state.provincia" autocomplete="provincia" />
            <x-jet-input-error for="provincia" class="mt-2" />
        </div>
        <!-- Municipio -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="municipio" value="{{ __('Municipio') }}" />
            <x-jet-input id="municipio" type="text" class="mt-1 block w-full" wire:model.defer="state.municipio" autocomplete="municipio" />
            <x-jet-input-error for="municipio" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
