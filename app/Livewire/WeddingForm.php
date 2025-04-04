<?php

namespace App\Livewire;

use App\Models\Guest;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Livewire\Component;
use Filament\Forms;

class WeddingForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public string $uuid = '';
    public array $persons = [];

    public string $mode = 'pass';

    public function mount(Guest $guest): void
    {
        $this->uuid = $guest->uuid;
        $this->persons = $guest->persons
            ->keyBy('name')
            ->map(fn ($person) => $person->name)
            ->toArray();
        $this->form->fill($guest->form ?? []);
        if ($guest->formIsSubmitted()) {
            $this->mode = 'view';
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Radio::make('transfer')
                    ->label('Потребуется ли вам трансфер из Коломны в Бережки-Холл?')
                    ->options([
                        'no' => 'Нет',
                        'before' => 'Только до Бережков',
                        'after' => 'Только после Бережков',
                        'both' => 'Туда и обратно',
                    ])
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Radio::make('eat_preference')
                    ->label('Есть ли у вас предпочтения в еде?')
                    ->options([
                        'no' => 'Нет',
                        'no_meat' => 'Не ем мясо',
                        'no_fish' => 'Не ем рыбу',
                        'vegetarian' => 'Вегетарианец',
                        'other' => 'Другое',
                    ])
                    ->live()
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('eat_preference_other')
                    ->label('Другие предпочтения в еде')
                    ->visible(fn (Get $get): bool => $get('eat_preference') == 'other')
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('allergy')
                    ->label('Есть ли у вас аллергия на что-то?'),
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
                    ->live()
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('alcohol_preference_other')
                    ->label('Другие предпочтения в алкоголе')
                    ->visible(fn (Get $get): bool => collect($get('alcohol_preference'))->contains('other'))
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Radio::make('zags')
                    ->label('Придете ли вы в ЗАГС в 10:00?')
                    ->options([
                        'yes' => 'Да',
                        'no' => 'Нет',
                    ])
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('music_preference')
                    ->label('Какую музыку вы предпочитаете?')
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->hint('Напишите 3 песни, под которые вы готовы танцевать и отжигать'),
                Forms\Components\CheckboxList::make('persons')
                    ->label('Будут присутствовать следующие персоны:')
                    ->options($this->persons)
                    ->required()
                    ->validationMessages([
                        'required' => 'Поле обязательно для заполнения',
                    ])
                    ->visible(fn() => !empty($this->persons))
            ])
            ->statePath('data');
    }
    public function render()
    {
        return view('livewire.wedding-form' , [
            'mode' => $this->mode,
        ]);
    }

    public function submit()
    {
        $data = $this->form->validate();
        $guest = Guest::query()->where('uuid', $this->uuid)->first();
        $guest->submit($data['data']);
        return redirect()->to($guest->personalUrl());
    }

    public function decline()
    {
        $guest = Guest::query()->where('uuid', $this->uuid)->first();
        $guest->decline();
        return redirect()->to($guest->personalUrl());
    }
}
