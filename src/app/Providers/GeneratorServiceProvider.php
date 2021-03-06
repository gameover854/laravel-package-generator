<?php

namespace HaiCS\Laravel\Generator\Providers;

use HaiCS\Laravel\Generator\Commands\CreateCommandCommand;
use HaiCS\Laravel\Generator\Commands\CreateControllerCommand;
use HaiCS\Laravel\Generator\Commands\CreateEntityCommand;
use HaiCS\Laravel\Generator\Commands\CreateEventCommand;
use HaiCS\Laravel\Generator\Commands\CreateListenerCommand;
use HaiCS\Laravel\Generator\Commands\CreateMigrationCommand;
use HaiCS\Laravel\Generator\Commands\CreateNotificationCommand;
use HaiCS\Laravel\Generator\Commands\CreatePackageCommand;
use HaiCS\Laravel\Generator\Commands\CreateRepositoryCommand;
use HaiCS\Laravel\Generator\Commands\CreateServiceProviderCommand;
use HaiCS\Laravel\Generator\Commands\CreateTestCommand;
use HaiCS\Laravel\Generator\Commands\CreateTransformerCommand;
use HaiCS\Laravel\Generator\Commands\CreateValidatorCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Generator service provider
 */
class GeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services
     *
     * @return void
     */
    public function boot()
    {
        $this->publishConfig();
    }

    /**
     * Register any package services
     *
     * @return void
     */
    public function register()
    {
        $this->registerCommands();
    }

    /**
     * Register any package commands
     *
     * @return void
     */
    protected function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CreateCommandCommand::class,
                CreatePackageCommand::class,
                CreateEntityCommand::class,
                CreateTestCommand::class,
                CreateControllerCommand::class,
                CreateRepositoryCommand::class,
                CreateValidatorCommand::class,
                CreateServiceProviderCommand::class,
                CreateTransformerCommand::class,
                CreateEventCommand::class,
                CreateListenerCommand::class,
                CreateNotificationCommand::class,
                CreateMigrationCommand::class,
            ]);
        }
    }

    protected function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/generator.php' => config_path('generator.php'),
        ]);
    }
}
