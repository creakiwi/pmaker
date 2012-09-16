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

/**
 * Description of CreateCommand
 *
 * @author Alexandre André <alexandre@creakiwi.com>
 */
class CreateCommand extends Command {
    protected function configure() {
        $this
            ->setName('create')
            ->setDescription('Create a new project')
            ->setHelp(<<<EOT
<info>php pmaker create project-name</info>
EOT
            );
    }
}

?>
