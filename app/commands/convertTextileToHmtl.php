<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Netcarver\Textile\Parser;

class convertTextileToHmtl extends Command {

    protected $parser = null;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'convert:textile-html';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Converts job descriptions from textile to html';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->parser = new Netcarver\Textile\Parser('html5');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $jobs = Job::all();

        foreach ($jobs as $job) {
            $job->description = $this->parser->textileThis($job->description);

            if( !$job->save() ) {
                $this->error('Job #' . $job->id . ' (' . $job->title . ') could not be converted.');
            }
        }

        $this->info('Conversion complete!');
    }

}
