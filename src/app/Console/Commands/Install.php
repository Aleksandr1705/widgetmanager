<?php

namespace almosoft\widgetmanager\app\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Install extends Command
{
    protected $progressBar;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'almosoft:widgetmanager:install
                                {--timeout=300} : How many seconds to allow each process to run.
                                {--debug} : Show process output or not. Useful for debugging.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish files for almosoft\widgetmanager to work';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->progressBar = $this->output->createProgressBar(12);
        $this->progressBar->start();
        $this->info(" almosoft\widgetmanager installation started. Please wait...");
        $this->progressBar->advance();

        $this->line(' Migrating');
        $this->executeProcess('php artisan migrate');

        $this->line(' Seeding');
        $this->executeProcess('php artisan db:seed --class=almosoft\widgetmanager\database\seeds\WidgetLayoutsSeeder');

        $this->line(' Add menu Widgets');
        $this->executeProcess("php artisan backpack:base:add-sidebar-content \"<li><a href='{{ backpack_url('widget') }}'><i class='fa fa-square-o'></i> <span>Widgets</span></a></li>\"");

        $this->line(' Add menu Widgetboard Layouts');
        $this->executeProcess("php artisan backpack:base:add-sidebar-content \"<li><a href='{{ backpack_url('widgetlayout') }}'><i class='fa fa-square-o'></i> <span>Widgetboard Layouts</span></a></li>\"");

        $this->line(' Add menu Widgetboards');
        $this->executeProcess("php artisan backpack:base:add-sidebar-content \"<li><a href='{{ backpack_url('widgetboard') }}'><i class='fa fa-square-o'></i> <span>Widgetboards</span></a></li>\"");

        $this->line(' Add menu Widgetboard-widgets');
        $this->executeProcess("php artisan backpack:base:add-sidebar-content \"<li><a href='{{ backpack_url('widgetboardwidget') }}'><i class='fa fa-square-o'></i> <span>Widgetboard-widgets</span></a></li>\"");

        
        $this->line(' Publishing WidgetBodyController');
        $this->executeProcess("php artisan vendor:publish --provider=\"almosoft\widgetmanager\widgetmanagerServiceProvider\" --tag=\"widgetmanager.widgetbodycontroller\"");

        $this->line(" Publishing assets");
        $this->executeProcess("php artisan vendor:publish --provider=\"almosoft\widgetmanager\widgetmanagerServiceProvider\" --tag=\"widgetmanager.assets\"");

        $this->line(" Publishing config");
        $this->executeProcess("php artisan vendor:publish --provider=\"almosoft\widgetmanager\widgetmanagerServiceProvider\" --tag=\"widgetmanager.config\"");        

        $this->line(" Publishing backpack dashboard view");
        $this->executeProcess("php artisan vendor:publish --provider=\"Backpack\Base\BaseServiceProvider\" --tag=\"views\"");        

        $this->line(" Composer dump-autoupdate");
        $this->executeProcess("composer dump-autoupdate");        

        $this->progressBar->finish();
        $this->info(" almosoft\widgetmanager installation finished.");
    }

    /**
     * Run a SSH command.
     *
     * @param string $command      The SSH command that needs to be run
     * @param bool   $beforeNotice Information for the user before the command is run
     * @param bool   $afterNotice  Information for the user after the command is run
     *
     * @return mixed Command-line output
     */
    public function executeProcess($command, $beforeNotice = false, $afterNotice = false)
    {
        $this->echo_text('info', $beforeNotice ? ' '.$beforeNotice : $command);

        $process = new Process($command, null, null, null, $this->option('timeout'), null);
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                $this->echo_text('comment', $buffer);
            } else {
                $this->echo_text('line', $buffer);
            }
        });

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if ($this->progressBar) {
            $this->progressBar->advance();
        }

        if ($afterNotice) {
            $this->echo('info', $afterNotice);
        }
    }

    /**
     * Write text to the screen for the user to see.
     *
     * @param [string] $type    line, info, comment, question, error
     * @param [string] $content
     */
    public function echo_text($type, $content)
    {
        if ($this->option('debug') == false) {
            return;
        }

        // skip empty lines
        if (trim($content)) {
            $this->{$type}($content);
        }
    }
}
