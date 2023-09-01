<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Forms\Components\Component;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseLogin;
use Illuminate\Support\Facades\Hash;

class Login extends BaseLogin
{
    private string $_email = 'user@example.com';

    private string $_password = 'password';

    protected function getEmailFormComponent(): Component
    {
        return parent::getEmailFormComponent()
            ->default($this->_email);
    }

    protected function getPasswordFormComponent(): Component
    {
        return parent::getPasswordFormComponent()
            ->default($this->_password);
    }

    public function authenticate(): ?LoginResponse
    {
        // seeder test user here
        $user = User::firstOrCreate([
            'email' => $this->_email,
        ], [
            'name' => 'John Doe',
            'password' => Hash::make($this->_password),
        ]);

        return parent::authenticate();
    }
}
