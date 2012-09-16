<?php

/*
 * This file is part of Pmaker
 * 
 * (c) Alexandre André <alexandre@creakiwi.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pmaker\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Yaml\Yaml;

/**
 * Description of InstallCommand
 *
 * @author Alexandre André <alexandre@creakiwi.com>
 */
class InstallCommand extends Command {
    protected function configure() {
        $this
            ->setName('install')
            ->setDescription('Install pmaker')
            ->setDefinition(array(
                new InputOption('projects-dir', 'p', InputOption::VALUE_REQUIRED, 'The directory where Symfony2 projects should be stored', $_SERVER['PWD'].'/projects/'),
                new InputOption('repo-dir', 'r', InputOption::VALUE_REQUIRED, 'The directory where Git repositories should be stored', $_SERVER['PWD'].'/repository/'),
                new InputOption('vhost-dir', 'vh', InputOption::VALUE_REQUIRED, 'The directory where virtual hosts are stored', '/etc/apache2/sites-available/'),
            ))
            ->setHelp(<<<EOT
<info>php pmaker install</info>
EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        return $this->install(
            $input->getOption('projects-dir'),
            $input->getOption('repo-dir'),
            $input->getOption('vhost-dir')
        );
    }

    protected function install($projectsDir = null, $repoDir = null, $vhostDir = null) {
        $config = array(
            'directories' => array(
                'projects'  => $projectsDir,
                'repo'      => $repoDir,
                'vhost'     => $vhostDir,
            ),
        );

        $dir = dirname(dirname($_SERVER['PWD'].'/'.$_SERVER['SCRIPT_FILENAME'])).'/config/';
        $fs = new Filesystem();
        if ($fs->exists($dir) === false)
            $fs->mkdir ($dir, 0755);
        
        file_put_contents($dir.'/config.yml', Yaml::dump($config));
    }
}

?>
