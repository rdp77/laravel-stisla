<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(
            session('url.intended', RouteServiceProvider::HOME),
            navigate: true
        );
    }
}; ?>

@section('pageTitle','Login')

<x-card.body-card>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form wire:submit="login">

        <!-- Email Address -->
        <div class="form-group">
            <x-form.input.label-input for="email" :value="__('Email')"/>
            <x-form.input.text-input wire:model="form.email" id="email" type="email" name="email" tabindex="1"
                                     required autofocus autocomplete="username" errorKey="email"/>
            @error('email')
            <x-form.input.error-input :messages="$errors->get('email')"/>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <div class="d-block">
                <x-form.input.label-input for="forgot-password" :value="__('Password')"/>
                <div class="float-right">
                    <a href="{{ route('password.request') }}" class="text-small" wire:navigate>
                        {{ __('Forgot Password?') }}
                    </a>
                </div>
            </div>
            <x-form.input.text-input wire:model="form.password" id="password" type="password" name="password"
                                     tabindex="2"
                                     required autocomplete="current-password" error-key="password"/>
            <x-form.input.error-input :messages="$errors->get('password')"/>
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <x-form.checkbox.checkbox label="Remember Me" trigger="remember-me" name="remember" model="form.remember"/>
        </div>

        <div class="form-group">
            <x-button.button class="btn-lg btn-block" tabindex="4" label="Log in"/>
        </div>
    </form>
    <div class="text-center mt-4 mb-3">
        <x-text.muted-text class="text-job">{{ __('Login With Social') }}</x-text.muted-text>
    </div>
    <div class="row sm-gutters">
        <div class="col-6">
            <x-button.social-button class="btn-facebook" icon="facebook" title="Facebook"/>
        </div>
        <div class="col-6">
            <x-button.social-button class="btn-twitter" icon="twitter" title="Twitter"/>
        </div>
    </div>
</x-card.body-card>
