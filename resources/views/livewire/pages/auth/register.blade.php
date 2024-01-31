<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public bool $is_agree = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'is_agree' => ['required', 'boolean', 'accepted'],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(RouteServiceProvider::HOME, navigate: true);
    }
}; ?>

@section('pageTitle','Register')

<x-card.body-card>
    <form wire:submit="register">

        <!-- Name -->
        <div class="form-group">
            <x-form.input.label-input for="name" :value="__('Name')"/>
            <x-form.input.text-input wire:model="name" id="name" type="text" name="name" required autofocus
                                     autocomplete="name"
                                     error-key="name"/>
            <x-form.input.error-input :messages="$errors->get('name')"/>
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <x-form.input.label-input for="email" :value="__('Email')"/>
            <x-form.input.text-input wire:model="email" id="email" type="email" name="email" required
                                     autocomplete="username"
                                     error-key="email"/>
            <x-form.input.error-input :messages="$errors->get('email')"/>
        </div>

        <div class="row">
            <!-- Password -->
            <div class="form-group col-6">
                <x-form.input.label-input for="password" :value="__('Password')"/>
                <x-form.input.text-input wire:model="password" id="password" data-indicator="pwindicator"
                                         type="password"
                                         name="password"
                                         required autocomplete="new-password" error-key="password"/>
                <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                </div>
                <x-form.input.error-input :messages="$errors->get('password')"/>
            </div>
            <!-- Confirm Password -->
            <div class="form-group col-6">
                <x-form.input.label-input for="password_confirmation" :value="__('Confirm Password')"/>
                <x-form.input.text-input wire:model="password_confirmation" id="password_confirmation"
                                         type="password"
                                         name="password_confirmation" required autocomplete="new-password"
                                         error-key="password_confirmation"/>
                <x-form.input.error-input :messages="$errors->get('password_confirmation')"/>
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div class="form-group">
            <x-form.checkbox.checkbox label="I agree with the terms and conditions" trigger="agree" name="is_agree"
                                 model="is_agree" :required="true"/>
        </div>

        <div class="form-group">
            <x-button.button class="btn-lg btn-block" tabindex="4" label="Register"/>
        </div>
    </form>
</x-card.body-card>
