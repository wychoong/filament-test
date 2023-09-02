<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Facades\Filament;
use Filament\Forms\Components\Placeholder;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Hash;

class Login extends BaseLogin
{
    private string $_email = 'user@example.com';

    private string $_password = 'password';

    private string $_user = 'John Doe';

    public function authenticate(): ?LoginResponse
    {
        // seeder test user here
        $user = User::firstOrCreate([
            'email' => $this->_email,
        ], [
            'name' => $this->_user,
            'password' => Hash::make($this->_password),
        ]);

        // dd($user);

        Filament::auth()->login($user, true);

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Placeholder::make('Login as')
                            ->content($this->_email),
                    ])
                    ->statePath('data'),
            ),
        ];
    }
}
