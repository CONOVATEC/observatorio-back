<?php

namespace Laravel\Sail\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sail:publish';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the Laravel Sail Docker files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'sail-docker']);

        file_put_contents(
            $this->laravel->basePath('docker-compose.yml'),
            str_replace(
                [
                    './vendor/laravel/sail/runtimes/8.2',
                    './vendor/laravel/sail/runtimes/8.1',
                    './vendor/laravel/sail/runtimes/8.0',
<<<<<<< HEAD
=======
                    './vendor/laravel/sail/runtimes/7.4',
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf
                ],
                [
                    './docker/8.2',
                    './docker/8.1',
                    './docker/8.0',
<<<<<<< HEAD
=======
                    './docker/7.4',
>>>>>>> e53e303c6cc827072ac019a4cb7508cf19c59ccf
                ],
                file_get_contents($this->laravel->basePath('docker-compose.yml'))
            )
        );
    }
}
