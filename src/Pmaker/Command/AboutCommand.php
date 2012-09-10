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
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Description of AboutCommand
 *
 * @author Alexandre André <alexandre@creakiwi.com>
 */
class AboutCommand extends Command {
    protected function configure() {
        $this
            ->setName('about')
            ->setDescription('Informations about Pmaker')
            ->setHelp(<<<EOT
<info>php pmaker about</info>
EOT
                    );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $output->writeln(<<<EOT
<info>Pmaker - A project maker for Symfony 2 applications using Git</info>
<comment>Pmaker is a tool to instanciate Symfony 2 projects using Git with a remote repository (for now)</comment>
EOT
        );
    }
}

?>
