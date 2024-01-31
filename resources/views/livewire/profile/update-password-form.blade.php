<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');

        $this->dispatch('password-updated');
    }
}; ?>

<x-card.child-card>
    <form wire:submit="updatePassword">
        <x-card.header-card title="Update Password"/>
        <x-card.body-card>
            <x-alert.alert message="Your password has been updated." on="password-updated"/>
            <p>
                {{ __('Ensure your account is using a long, random password to stay secure.') }}
            </p>

            <!-- Current Password -->
            <div class="form-group">
                <x-form.input.label-input for="update_password_current_password" :value="__('Current Password')"/>
                <x-form.input.text-input wire:model="current_password" id="update_password_current_password"
                                         type="password" name="current_password" autocomplete="current-password"
                                         errorKey="current_password"/>
                @error('current_password')
                <x-form.input.error-input :messages="$errors->get('current_password')"/>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-form.input.label-input for="update_password_password" :value="__('New Password')"/>
                <x-form.input.text-input wire:model="password" id="update_password_password" type="password"
                                         name="password" errorKey="password"/>
                @error('password')
                <x-form.input.error-input :messages="$errors->get('password')"/>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-form.input.label-input for="update_password_password_confirmation"
                                          :value="__('Confirm Password')"/>
                <x-form.input.text-input wire:model="password_confirmation"
                                         id="update_password_password_confirmation" type="password"
                                         name="password_confirmation" autocomplete="new-password"
                                         errorKey="password_confirmation"/>
                @error('password_confirmation')
                <x-form.input.error-input :messages="$errors->get('password_confirmation')"/>
                @enderror
            </div>
        </x-card.body-card>
        <x-card.footer-card class="text-right">
            <x-button.button label="Save Changes"/>
        </x-card.footer-card>
    </form>
</x-card.child-card>
