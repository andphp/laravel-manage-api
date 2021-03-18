<?php

namespace App\Console\Commands;

use App\Librarys\Generate\Parsedown;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class ApiDocsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'docs:markdownToHtml';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Data conversion from markdown format to html format';

    protected $filePaths;
    protected $files;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->filePaths = getDir(app_path().'/ApiDocs/Markdown');
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = new Parsedown();
        foreach ($this->filePaths as $fileName){
            $markdownData = file_get_contents( $fileName);
            $htmlContent = $Parsedown->text($markdownData);

            $this->info($fileName.' created successfully.');
        }
    }


    /**
     * Write a string as information output.
     *
     * @param  string  $string
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function info($string, $verbosity = null)
    {
        $this->line($string, 'info', $verbosity);
    }

    /**
     * Write a string as standard output.
     *
     * @param  string  $string
     * @param  string|null  $style
     * @param  int|string|null  $verbosity
     * @return void
     */
    public function line($string, $style = null, $verbosity = null)
    {
        $styled = $style ? "<$style>$string</$style>" : $string;

        $this->output->writeln($styled, $this->parseVerbosity($verbosity));
    }

}
