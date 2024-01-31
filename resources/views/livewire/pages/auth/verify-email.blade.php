<?php

use App\Livewire\Actions\Logout;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth')] class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirect(
                session('url.intended', RouteServiceProvider::HOME),
                navigate: true
            );

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

@section('pageTitle','Verify Email')

<x-card.body-card>
    @if (session('status') === 'verification-link-sent')
        <x-alert.dismissible-alert type="success"
                                   message="A new verification link has been sent to the email address you provided during registration."/>
    @endif
    <p>
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </p>
    <div class="form-group text-center">
        <x-button.button wire:click="sendVerification" label="Resend Verification Email"/>
        <x-button.button wire:click="logout" type="danger" label="Log Out"/>
    </div>
</x-card.body-card>
