<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Command\BaseCommand as Command;

class CmdHelp extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){


        if($this->getParameterCount() <= 0) {

            $outputter->printLine("CD Displays the name of or changes the current directory.");
            $outputter->printLine("DIR Displays a list of files and subdirectories in a directory.");
            $outputter->printLine("EXIT Quits the CMD.EXE program (command interpreter).");
            $outputter->printLine("FORMAT Formats a disk for use with Windows.");
            $outputter->printLine("HELP Provides Help information for Windows commands.");
            $outputter->printLine("LABEL Creates, changes, or deletes the volume label of disk.");
            $outputter->printLine("MKDIR Creates a directory");
            $outputter->printLine("MKFILE Created a file.");
            $outputter->printLine("MOVE Moves one or more files from one directory to another directory.");

        } else {

            $commandName = $this->params[0];

            switch ($commandName) {
                case 'CD':
                case 'cd':
                    $outputter->printLine("CD Displays the name of or changes the current directory.");
                    break;
                case 'DIR':
                case 'dir':
                    $outputter->printLine("DIR Displays a list of files and subdirectories in a directory.");
                    break;
                case 'EXIT':
                case 'exit':
                    $outputter->printLine("EXIT Quits the CMD.EXE program (command interpreter).");
                    break;
                case 'FORMAT':
                case 'format':
                    $outputter->printLine("FORMAT Formats a disk for use with Windows.");
                    break;
                case 'HELP':
                case 'help':
                    $outputter->printLine("HELP Provides Help information for Windows commands.");
                    break;
                case 'LABEL':
                case 'label':
                    $outputter->printLine("LABEL Creates, changes, or deletes the volume label of disk.");
                    break;
                case 'MKDIR':
                case 'mkdir':
                    $outputter->printLine("MKDIR Creates a directory");
                    break;
                case 'MKFILE':
                case 'mkfile':
                    $outputter->printLine("MKFILE Created a file.");
                    break;
                case 'MOVE':
                case 'move':
                    $outputter->printLine("MOVE Moves one or more files from one directory to another directory.");
                    break;

                default:
                    $outputter->printLine("This command is not supported by the help utility.");
                    break;
            }

        }
    }

}