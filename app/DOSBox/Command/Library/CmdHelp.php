<?php

namespace DOSBox\Command\Library;

use DOSBox\Command\BaseCommand as Command;
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

class CmdHelp extends Command
{
    const HELP_CONTENTS = [
        'cd'        => "CD      Displays the name of or changes the current directory.",
        'dir'       => "DIR     Displays a list of files and subdirectories in a directory.",
        'exit'      => "EXIT    Quits the CMD.EXE program (command interpreter).",
        'format'    => "FORMAT  Formats a disk for use with Windows.",
        'help'      => "HELP    Provides Help information for Windows commands.",
        'label'     => "LABEL   Creates, changes, or deletes the volume label of disk.",
        'mkdir'     => "MKDIR   Creates a directory",
        'mkfile'    => "MKFILE  Created a file.",
        'move'      => "MOVE    Moves one or more files from one directory to another directory.",
    ];

    const HELP_ERROR = "Fatal Error: This command is not supported by the help utility.";

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

        if ($this->getParameterCount() <= 0) {
            $outputter->printLine(implode("\n", array_values(self::HELP_CONTENTS)));
        } else {

            $commandName = strtolower($this->params[0]);

            switch ($commandName) {
                case 'cd':
                    $outputter->printLine(self::HELP_CONTENTS["cd"]);
                    break;
                case 'dir':
                    $outputter->printLine(self::HELP_CONTENTS["dir"]);
                    break;
                case 'exit':
                    $outputter->printLine(self::HELP_CONTENTS["exit"]);
                    break;
                case 'format':
                    $outputter->printLine(self::HELP_CONTENTS["format"]);
                    break;
                case 'help':
                    $outputter->printLine(self::HELP_CONTENTS["help"]);
                    break;
                case 'label':
                    $outputter->printLine(self::HELP_CONTENTS["label"]);
                    break;
                case 'mkdir':
                    $outputter->printLine(self::HELP_CONTENTS["mkdir"]);
                    break;
                case 'mkfile':
                    $outputter->printLine(self::HELP_CONTENTS["mkfile"]);
                    break;
                case 'move':
                    $outputter->printLine(self::HELP_CONTENTS["move"]);
                    break;

                default:
                    $outputter->printLine(self::HELP_ERROR);
                    break;
            }
        }
    }
}
