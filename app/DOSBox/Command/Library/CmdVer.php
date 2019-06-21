<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
    const PARAMETER_CONTAINS_BACKLASH = "At least one parameter denotes a path rather than a directory name.";


    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return $numberOfParametersEntered >= 0 ? true : false;
    }

    public function checkParameterValues(IOutputter $outputter) {
        for($i=0; $i< $this->getParameterCount(); $i++) {
            if ($this->parameterContainsBacklashes($this->getParameterAt($i), $outputter))
                return false;
        }
        return true;
    }

    // TODO: Unit test
    public static function parameterContainsBacklashes($parameter, IOutputter $outputter) {
        // Do not allow "mkdir c:\temp\dir1" to keep the command simple
        /*if (strstr($parameter, "\\") !== false || strstr($parameter, "/") !== false) {
            $outputter->printLine(self::PARAMETER_CONTAINS_BACKLASH);
            return true;
        }
        */

        return false;
    }

    public function execute(IOutputter $outputter){
        
        if($this->getParameterCount() == 0)
        $outputter->printLine("Microsoft Windows XP [Version 5.1.2600]");
        elseif($this->params[0] == '/w')
        {
            $outputter->printLine("Microsoft Windows XP [Version 5.1.2600]");
            $outputter->printLine("Muhammad Iqbal - iqbalzehan1@gmail.com");
            $outputter->printLine("Arvel Alana - arvelalana@gmail.com");
            $outputter->printLine("Rahmat Kurnianto - rahmat.kurnianto.rk@gmail.com");
            $outputter->printLine("Meftahul Jannah - tackulmine@gmail.com");
            $outputter->printLine("Andre - setiadiandre10@gmail.com");
        }
        
    }

    
}