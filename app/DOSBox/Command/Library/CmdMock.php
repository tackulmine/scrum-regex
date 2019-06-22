<?php

namespace DOSBox\Command\Library;

use DOSBox\Command\BaseCommand as Command;
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

class CmdMock extends Command
{
    public $executed = false;

    public function __construct($commandName, IDrive $drive)
    {
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered)
    {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter)
    {
        return true;
    }

    public function execute(IOutputter $outputter)
    {
        $this->executed = true;
    }
}
