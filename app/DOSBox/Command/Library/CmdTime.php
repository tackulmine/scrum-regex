<?php

namespace DOSBox\Command\Library;

use DOSBox\Command\BaseCommand as Command;
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

class CmdTime extends Command
{
    const TIME_ERROR = "Fatal error: Command rejected";

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

        if ($this->getParameterCount() > 0) {
            $doubleDotsCount = explode(":", $this->params[0]);
            if (strlen($this->params[0]) == 8
                and count($doubleDotsCount) == 3
            ) {
                // $outputter->printLine('');
            } else {
                $outputter->printLine(self::TIME_ERROR);
            }
        } else {
            date_default_timezone_set("Asia/Bangkok");
            $outputter->printLine("Current time " . date("d-m-Y h:i:sa"));
        }
    }
}
