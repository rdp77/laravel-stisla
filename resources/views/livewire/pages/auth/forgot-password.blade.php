<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email', 'exists:users,email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

@section('pageTitle','Forgot Password')

<x-card.body-card>
    <p class="text-muted">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
        password reset link that will allow you to choose a new one.') }}
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div class="form-group">
            <x-form.input.label-input for="email" :value="__('Email')"/>
            <x-form.input.text-input wire:model="email" id="email" type="email" name="email"
                          required autofocus errorKey="email"/>
            @error('email')
            <x-form.input.error-input :messages="$errors->get('email')"/>
            @enderror
        </div>

        <x-button.button class="btn-lg btn-block" tabindex="4" label="Email Password Reset Link"/>
    </form>
</x-card.body-card>
