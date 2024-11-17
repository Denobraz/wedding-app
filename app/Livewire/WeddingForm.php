<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Forms;

class WeddingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('transfer')
                    ->label('Потребуется ли вам трансфер?')
                    ->options([
                        'no' => 'Нет',
                        'before' => 'Только до торжества',
                        'after' => 'Только после торжества',
                        'both' => 'И до и после торжества',
                    ])
                    ->required(),
                Forms\Components\Radio::make('eat_preference')
                    ->label('Есть ли у вас предпочтения в еде?')
                    ->options([
                        'no' => 'Нет',
                        'no_meat' => 'Не ем мясо',
                        'no_fish' => 'Не ем рыбу',
                        'vegetarian' => 'Вегетарианец',
                    ])
                    ->required(),
                Forms\Components\CheckboxList::make('alcohol_preference')
                    ->label('Какой алкоголь вы предпочитаете?')
                    ->options([
                        'red_wine' => 'Красное вино',
                        'white_wine' => 'Белое вино',
                        'champagne' => 'Шампанское',
                        'whiskey/cognac' => 'Виски/коньяк',
                        'vodka' => 'Водка',
                        'other' => 'Другое',
                        'no_alcohol' => 'Не пью алкоголь',
                    ])
                    ->required(),
                Forms\Components\Radio::make('zags')
                    ->label('Придете ли вы в ЗАГС в 10:00?')
                    ->options([
                        'yes' => 'Да',
                        'no' => 'Нет',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('music_preference')
                    ->label('Какую музыку вы предпочитаете?')
                    ->hint('Напишите 3 песни, под которые вы готовы танцевать и отжигать'),
            ])
            ->statePath('data');
    }
    public function render()
    {
        return view('livewire.wedding-form');
    }

    public function submit()
    {
        $this->form->validate();
    }
}
