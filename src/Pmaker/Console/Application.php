<?php

/*
 * This file is part of Pmaker
 * 
 * (c) Alexandre André <alexandre@creakiwi.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pmaker\Console;

use Symfony\Component\Console\Application as BaseApplication;

use Pmaker\Command;

/**
 * Description of Application
 *
 * @author Alexandre André <alexandre@creakiwi.com>
 */
class Application extends BaseApplication {
    public function __construct() {
        parent::__construct('Pmaker', '0.1');
    }

    protected function getDefaultCommands() {
        $commands   = parent::getDefaultCommands();
        $commands[] = new Command\AboutCommand();
        $commands[] = new Command\InstallCommand();
        $commands[] = new Command\CreateCommand();

        return $commands;
    }
}

?>
