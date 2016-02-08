<?php
/**
 * Created by PhpStorm.
 * User: jbelinchonm
 * Date: 11/12/15
 * Time: 17:51
 */

namespace Vallas\ModelBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateFixturesCommand extends ContainerAwareCommand
{
	protected function configure()
{
	$this
		->setName('es:fixtures:load')
		->setDescription('Creates Fixtures')
		->setHelp(
			<<<EOT
                    The <info>%command.name%</info>command purges and creates new fixtures in your database.

<info>php %command.full_name% name</info>

EOT
		);
}

	protected function execute(InputInterface $input, OutputInterface $output)
{

	$text = 'Dropping database ... ';
	if ($this->dropDatabase($input, $output)) {
		$text .= 'database successfully dropped ...';
	} else {
		$text .= 'database could not be dropped ...';
	}
	$output->writeln($text);
	$output->writeln('');

	$text = 'Creating database ... ';
	if ($this->createDatabase($input, $output)) {
		$text .= 'database successfully re-created ...';
	} else {
		$text .= 'database could not be created ...';
	}
	$output->writeln($text);
	$output->writeln('');

	$text = 'Creating schema ... ';
	if ($this->createSchema($input, $output)) {
		$text .= 'schema successfully created ...';
	} else {
		$text .= 'schema could not be created ...';
	}
	$output->writeln($text);
	$output->writeln('');

	$text = 'Loading fixtures ... ';
	if ($this->loadFixtures($input, $output)) {
		$text .= 'fixtures successfully generated ...';
	} else {
		$text .= 'fixtures could not be generated ...';
	}
	$output->writeln($text);
	$output->writeln('');

	$output->writeln('Database is ready for testing!........');

	$output->writeln($text);
	$output->writeln('');

	$output->writeln('......................................');
	$output->writeln('');

}

	private function dropDatabase($input, $output)
	{
		//Drop Database
		$app = $this->getApplication();
		$input = new ArrayInput(array('command'=>'doctrine:database:drop', '--force'=>true, '--if-exists' => true));
		$returnCode = $app->doRun($input, $output);

		if($returnCode == 0) {
			return true;
		} else {
			return false;
		}
	}

	private function createDatabase($input, $output)
	{
		//Create Database
		$app = $this->getApplication();
		$input = new ArrayInput(array('command'=>'doctrine:database:create'));
		$returnCode = $app->doRun($input, $output);
		if($returnCode == 0) {
			return true;
		} else {
			return false;
		}
	}

	private function createSchema($input, $output)
	{
		//Create Schema
		$app = $this->getApplication();
		$input = new ArrayInput(array('command'=>'doctrine:schema:create'));
		$returnCode = $app->doRun($input, $output);
		if($returnCode == 0) {
			return true;
		} else {
			return false;
		}
	}

	private function loadFixtures($input, $output)
	{
		//Create Fixtures
		$app = $this->getApplication();
		$input = new ArrayInput(array('command'=>'hautelook_alice:doctrine:fixtures:load'));
		$returnCode = $app->doRun($input, $output);
		if($returnCode == 0) {
			return true;
		} else {
			return false;
		}
	}
}