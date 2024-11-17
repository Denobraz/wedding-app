<div>
    <form wire:submit="submit">
        {{ $this->form }}

        <x-button wire:click="submit" class="w-full mt-10" size="lg" type="dark">Принять приглашение</x-button>
    </form>

</div>
