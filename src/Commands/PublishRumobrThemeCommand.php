<?php

namespace Nunes\RumobrTheme\Commands;

use Illuminate\Console\Command; 

class PublishRumobrThemeCommand extends Command
{
    protected $signature = 'rumobr-theme:publish {--force : Sobrescrever arquivos existentes}';
    protected $description = 'Publica os componentes Vue e CSS do tema Rumobr';

    public function handle()
    {
        $force = $this->option('force') ? '--force' : '';

        $this->call('vendor:publish', [
            '--provider' => 'Nunes\\RumobrTheme\\RumobrThemeServiceProvider',
            '--tag' => 'rumobr-theme-components',
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'Nunes\\RumobrTheme\\RumobrThemeServiceProvider',
            '--tag' => 'rumobr-theme-pages',
        ]);

        $this->call('vendor:publish', [
            '--provider' => 'Nunes\\RumobrTheme\\RumobrThemeServiceProvider',
            '--tag' => 'rumobr-theme-css',
        ]);

        $this->info('✓ Componentes Vue e CSS publicados com sucesso!');
        $this->line('');
        $this->info('Arquivos publicados em:');
        $this->line('  - resources/js/components/');
        $this->line('  - resources/js/pages/');
        $this->line('  - resources/css/');
    }
}
