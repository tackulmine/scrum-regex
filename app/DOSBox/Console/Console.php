<?php

namespace DOSBox\Console;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IExecuteCommand;
use DOSBox\Interfaces\IOutputter;

class Console
{
    private $invoker;
    private $drive;
    private $outputter;

    public function __construct(IExecuteCommand $invoker, IDrive $drive, IOutputter $outputter)
    {
        $this->invoker = $invoker;
        $this->drive = $drive;
        $this->outputter = $outputter;
    }

    public function processInput()
    {
        $this->outputter->printLine("DOSBox, Scrum.org, Professional Scrum Developer Training.");
        $this->outputter->printLine("Copyright (c) Joshua Partogi. All rights reserved.");

        $line = "";

        while ((strcmp(trim($line), "exit") != 0 && strcmp(trim($line), "exit gugus") != 0)) {
            $this->outputter->newLine();
            $this->outputter->printNoLine($this->drive->getPrompt());

            try {
                $char = trim(fread(STDIN, 256));
                //$char = trim(fgets(STDIN));
                $line = $char;
            } catch (Exception $e) {
                // do nothing by intention
            }

            if ($line != "exit" && $line != "exit gugus" && $line != "exit1") {
                $this->invoker->executeCommand($line, $this->outputter);
            }
        }

        $this->outputter->printLine("Goodbye!");
    }
}
