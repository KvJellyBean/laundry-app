<?php

namespace App\Filament\Auth;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use Filament\Events\Auth\Registered;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Pages\Auth\Register as AuthRegister;
use Filament\Notifications\Notification;
use Filament\Facades\Filament;

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

    public function register(): ?RegistrationResponse
{
    try {
        $this->rateLimit(2);
    } catch (TooManyRequestsException $exception) {
        Notification::make()
            ->title(__('filament-panels::pages/auth/register.notifications.throttled.title', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]))
            ->body(array_key_exists('body', __('filament-panels::pages/auth/register.notifications.throttled') ?: []) ? __('filament-panels::pages/auth/register.notifications.throttled.body', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => ceil($exception->secondsUntilAvailable / 60),
            ]) : null)
            ->danger()
            ->send();

        return null;
    }

    $data = $this->form->getState();
    $data['role'] = $data['role'] ?? 'user';

    $user = $this->getUserModel()::create($data);
    $user->assignRole($data['role']);

    event(new Registered($user));

    $this->sendEmailVerificationNotification($user);

    Filament::auth()->login($user);

    session()->regenerate();

    return app(RegistrationResponse::class);
}

}