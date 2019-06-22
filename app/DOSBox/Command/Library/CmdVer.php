<?php

namespace DOSBox\Command\Library;

use DOSBox\Command\BaseCommand as Command;
use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

class CmdVer extends Command
{
    const OS_VER = "Microsoft Windows XP [Version 5.1.2600]";
    const DEVS = [
        'Muhammad Iqbal - iqbalzehan1@gmail.com',
        'Arvel Alana - arvelalana@gmail.com',
        'Rahmat Kurnianto - rahmat.kurnianto.rk@gmail.com',
        'Meftahul Jannah - tackulmine@gmail.com',
        'Andre - setiadiandre10@gmail.com',
    ];

    public function __construct($commandName, IDrive $drive)
    {
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered)
    {
        return $numberOfParametersEntered >= 0 ? true : false;
    }

    public function checkParameterValues(IOutputter $outputter)
    {
        for ($i = 0; $i < $this->getParameterCount(); $i++) {
            if ($this->parameterContainsBacklashes($this->getParameterAt($i), $outputter)) {
                return false;
            }
        }
        return true;
    }

    // TODO: Unit test
    public function parameterContainsBacklashes($parameter, IOutputter $outputter)
    {
        // Do not allow "mkdir c:\temp\dir1" to keep the command simple
        /*if (strstr($parameter, "\\") !== false || strstr($parameter, "/") !== false) {
        $outputter->printLine(self::PARAMETER_CONTAINS_BACKLASH);
        return true;
        }
         */

        return false;
    }

    public function execute(IOutputter $outputter)
    {

        if ($this->getParameterCount() == 0) {
            $outputter->printLine(self::OS_VER);
        } elseif ($this->params[0] == '/w') {
            $outputter->printLine(self::OS_VER);
            $outputter->printLine(implode("\n", self::DEVS));
        }
    }
}
