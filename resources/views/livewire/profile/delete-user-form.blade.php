<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/');
    }
}; ?>

<x-card.child-card class="card-danger">
    <x-card.header-card title="Delete Account" :color="false"/>
    <x-card.body-card>
        <p>
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.
            Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>

        <x-button.button type="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                         label="Delete Account"/>

        <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
            <form wire:submit="deleteUser" class="p-3">
                <h2>
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </p>

                <div class="mt-6">
                    <div class="form-group">
                        <x-form.input.label-input for="password" :value="__('Password')"/>
                        <x-form.input.text-input wire:model="password" id="password"
                                                 type="password" name="password" placeholder="{{ __('Password') }}"
                                                 errorKey="password"/>
                        @error('password')
                        <x-form.input.error-input :messages="$errors->get('password')"/>
                        @enderror
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <x-button.button type="secondary" x-on:click="$dispatch('close')" label="Cancel"/>

                    <x-button.button type="danger" class="ms-3" label="Delete Account"/>
                </div>
            </form>
        </x-modal>
    </x-card.body-card>
</x-card.child-card>
