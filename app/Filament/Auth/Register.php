<?php

namespace App\Filament\Auth;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Auth\Register as AuthRegister;

class Register extends AuthRegister
{
    public function form(Form $form): Form
    {
        return $form->schema([
            $this->getNameFormComponent(),
            $this->getEmailFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),

            TextInput::make('address')
                ->label('Address')
                ->placeholder('Enter your address')
                ->required(),
            TextInput::make('phone_number')
                ->label('Phone Number')
                ->placeholder('Enter your phone number (e.g. 081234567890)')
                ->required()
                ->type('number'),
        ])
        ->statePath('data');
    }
}