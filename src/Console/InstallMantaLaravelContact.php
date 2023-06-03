<?php

namespace Manta\LaravelContact\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InstallMantaLaravelContact extends Command
{
    protected $signature = 'manta-contact:install';

    protected $description = 'Install Manta Laravel Contact';

    public function handle()
    {
        $this->info('Installing Manta Contact module...');

        $this->info('Migrate...');
        $this->call('migrate');

        $this->info('Publishing configuration...');

        if (!$this->configExists('manta-contact.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        // (new Filesystem)->copyDirectory(__DIR__ . '/../Models', app_path('Models'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/app/Http', app_path('Http'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/app/Mail', app_path('Mail'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/resources/views', resource_path('views'));
        (new Filesystem)->copyDirectory(__DIR__ . '/../stubs/resources/lang', resource_path('lang'));

        if (!Str::contains(file_get_contents(base_path('routes/web.php')), "'manta.contact.list'")) {
            (new Filesystem)->append(base_path('routes/web.php'), file_get_contents(__DIR__ . '/../stubs/routes/web.php'));
        }

        $this->info('Installed Manta Contact module');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Manta\LaravelContact\Providers\MantaContactProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }

    private function seedUserDemo()
    {
        // DB::table('users')->where('email', 'demo@manta.website')->delete();
        // DB::table('users')->insert([
        //     'name' => 'demo',
        //     'email' => 'demo@manta.website',
        //     'password' => Hash::make('password'),
        // ]);
        // $this->info('User added');
        // $this->line('User: demo@manta.website');
        // $this->line('Pass: password');
    }

    /**
     * Replace a given string within a given file.
     *
     * @param  string  $search
     * @param  string  $replace
     * @param  string  $path
     * @return void
     */
    protected function replaceInFile($search, $replace, $path)
    {
        file_put_contents($path, str_replace($search, $replace, file_get_contents($path)));
    }
}
