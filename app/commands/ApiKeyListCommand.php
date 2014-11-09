<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class ApiKeyListCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'apikey:list';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Lists all API Keys';

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
		$apiKeys = ApiKey::all();
		$this->info("Keys:");
		if (count($apiKeys) == 0) {
			$this->info(" There were no keys found!");
			return;
		}
		foreach ($apiKeys as $key) {
			$this->info(" " . $key->key . "\t" . $key->description);
		}
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
		return [];
	}

}
