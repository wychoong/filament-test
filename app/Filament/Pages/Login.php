<?php

namespace App\Filament\Pages;

use App\Models\User;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Facades\Filament;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;
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

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('Login as')
                    ->state($this->_email),
            ]);
    }
}
