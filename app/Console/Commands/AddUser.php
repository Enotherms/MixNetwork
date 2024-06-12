<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddUser extends Command
{
    protected $signature = 'user:add';
    protected $description = 'Adds a single user to the database';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->ask('Enter the user name');
        $email = $this->ask('Enter the user email');
        $password = $this->secret('Enter the user password');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password)
        ]);

        $this->info('User added successfully!');
    }
}