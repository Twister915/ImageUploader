<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ApiKeyGenerateCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'apikey:generate';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Generates a fresh API key for you to use';

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
	public function fire()
	{
		$apiKey = new ApiKey;
		$desc = $this->option('description');
		if ($desc != null) {
			$apiKey->description = $desc;
		}
		$apiKey->key = FileController::generateRandomKey(32);
		$apiKey->save();
		$this->info("Generated API Key: " . $apiKey->key);
	}



	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return [];
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return [['description', null, InputOption::VALUE_OPTIONAL, 'Describe the API Key', null]];
	}

}
