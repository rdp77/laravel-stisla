<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function sendVerification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $path = session('url.intended', RouteServiceProvider::HOME);

            $this->redirect($path);

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<x-card.child-card>
    <form wire:submit="updateProfileInformation">
        <x-card.header-card title="Profile Information"/>
        <x-card.body-card>
            <x-alert.alert message="Profile Information has been updated." on="profile-updated"/>
            <p>
                {{ __('Update your account\'s profile information and email address.') }}
            </p>

            <!-- Name -->
            <div class="form-group">
                <x-form.input.label-input for="name" :value="__('Name')"/>
                <x-form.input.text-input wire:model="name" id="name" type="text" name="name" autocomplete="name"
                                         required autofocus autocomplete="name" errorKey="name"/>
                @error('name')
                <x-form.input.error-input :messages="$errors->get('name')"/>
                @enderror
            </div>

            <!-- Email -->
            <div class="form-group">
                <x-form.input.label-input for="email" :value="__('Email')"/>
                <x-form.input.text-input wire:model="email" id="email" type="email" autocomplete="username"
                                         name="email" errorKey="email"/>
                @error('email')
                <x-form.input.error-input :messages="$errors->get('email')"/>
                @enderror
            </div>

            @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
            ! auth()->user()->hasVerifiedEmail())
                <div>
                    <p>
                        {{ __('Your email address is unverified.') }}

                        <button wire:click.prevent="sendVerification" class="btn btn-primary">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p>
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </x-card.body-card>
        <x-card.footer-card class="text-right">
            <x-button.button label="Save"/>
        </x-card.footer-card>
    </form>
</x-card.child-card>
