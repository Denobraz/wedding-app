<div>
    <form wire:submit="submit">
        {{ $this->form }}

        <x-button wire:click="submit" class="w-full mt-10" size="lg" type="dark">
            @if($mode === 'pass')
                Принять приглашение
            @else
                Изменить решение
            @endif
        </x-button>
    </form>
    <x-button
        wire:confirm="Вы уверены, что хотите отказаться от приглашения?"
        wire:click="decline" class="w-full mt-4" size="lg" type="danger-outline">
        Отказаться от приглашения
    </x-button>
</div>

