<?php

namespace DOSBox\Command\Library;

use DOSBox\Command\BaseCommand as Command;
use DOSBox\Filesystem\File;
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

class CmdMkFile extends Command
{
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
        $fileName = $this->params[0];
        $fileContent = "";

        if ($this->getParameterCount() == 2) {
            $fileContent = $this->params[1];
        }

        $newFile = new File($fileName, $fileContent);

        $directory_name = str_split($this->getDrive()->getCurrentDirectory());

        $directory_name = $directory_name[count($directory_name) - 1];

        $namefile = explode(".", $fileName);

        if ($directory_name == $namefile[0]) {
            $outputter->printLine("Nama file tidak boleh sama dengan nama folder");
        } else {
            $this->getDrive()->getCurrentDirectory()->add($newFile);
        }
    }
}
