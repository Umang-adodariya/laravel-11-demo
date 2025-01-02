<?php

namespace App\Console\Commands;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Console\Command;

class setupProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup-project';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Migrations, seeders and create admin';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->runMigrations();
        $this->runSeeders();
        $this->createAdmin();
    }

    public function runMigrations()
    {
        $confirm = $this->ask('Do you want to run all migrations? Yes/No');
        if ($confirm == 'Yes' || $confirm == 'yes' || $confirm == 'y' || $confirm == 'Y') {
            $this->call('migrate');
        }
    }

    public function runSeeders()
    {
        $confirm = $this->ask('Do you want to run all Seeders? Yes/No');
        if ($confirm == 'Yes' || $confirm == 'yes' || $confirm == 'y' || $confirm == 'Y') {
            $this->call('db:seed', ['--class' => 'RoleSeeder']);
            $this->call('db:seed', ['--class' => 'PermissionTableSeeder']);
        }
    }

    public function createAdmin()
    {
        $name = $this->ask('Admin name');

        $email = $this->ask('Admin email ');
        $password = $this->ask('Admin password ');

        $adminUser = new UserService();
        $response = $adminUser->createAdminUser([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        if ($response['status']) {
            foreach ($response['message'] as $message) {
                $this->info($message);
                $this->newLine();
            }
        } else {
            foreach ($response['message'] as $message) {
                $this->error($message);
                $this->newLine();
            }
        }
    }
}
