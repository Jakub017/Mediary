<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __("Zaktualizuj hasło") }}
    </x-slot>

    <x-slot name="description">
        {{
            __(
                "Upewnij się, że Twoje konto używa długiego, losowego hasła, aby zachować bezpieczeństwo."
            )
        }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Obecne hasło') }}" />
            <x-input
                id="current_password"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.current_password"
                autocomplete="current-password"
            />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('Nowe hasło') }}" />
            <x-input
                id="password"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.password"
                autocomplete="new-password"
            />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label
                for="password_confirmation"
                value="{{ __('Powtórz nowe hasło') }}"
            />
            <x-input
                id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.password_confirmation"
                autocomplete="new-password"
            />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-button>
            {{ __("Zaktualizuj") }}
        </x-button>

        <x-action-message class="ml-2" on="saved">
            {{ __("Hasło zaktualizowane.") }}
        </x-action-message>
    </x-slot>
</x-form-section>
