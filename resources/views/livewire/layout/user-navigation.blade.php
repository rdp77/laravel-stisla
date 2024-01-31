<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component {
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/');
    }
}; ?>

<li class="dropdown">
    <a href="#" data-toggle="dropdown"
       class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="{{ Vite::image('avatar/avatar-1.png') }}"
             class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block"
             x-data="{{ json_encode(['name' => 'Hi, '. auth()->user()->name], JSON_THROW_ON_ERROR) }}"
             x-text="name">
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="{{ route('profile') }}" class="dropdown-item has-icon" wire:navigate>
            <i class="far fa-user"></i> Profile
        </a>
        <a href="#" class="dropdown-item has-icon">
            <i class="fas fa-bolt"></i> Activities
        </a>
        <a href="{{ route('settings') }}" class="dropdown-item has-icon" wire:navigate>
            <i class="fas fa-cog"></i> Settings
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item has-icon text-danger" style="cursor: pointer" wire:click="logout">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
    </div>
</li>
