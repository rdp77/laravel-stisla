<x-app-layout>
    <x-section.section>
        <x-section.header-section title="User Profile"/>
        <x-section.body-section>
            <x-section.title-section title="{{ __('Hi, ').Auth::user()->name.'!' }}"
                                     description="Change information about yourself on this page."/>
            <livewire:profile.update-profile-information-form/>
        </x-section.body-section>
    </x-section.section>
</x-app-layout>
