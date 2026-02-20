<?php

namespace Nunes\RumobrTheme;

use Illuminate\Support\ServiceProvider;

class RumobrThemeServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Configurações podem ser adicionadas aqui se necessário
    }

    public function boot()
    {
        // Publicar componentes Vue
        $this->publishes([
            __DIR__.'/Components' => resource_path('js/components'),
        ], 'rumobr-theme-components');
        
        $this->publishes([
            __DIR__.'/Pages' => resource_path('js/pages'),
        ], 'rumobr-theme-pages');

        // Publicar CSS
        $this->publishes([
            __DIR__.'/Assets/css' => resource_path('css'),
        ], 'rumobr-theme-css');

        // Registrar comando
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\PublishRumobrThemeCommand::class,
            ]);
        }
    }
}
