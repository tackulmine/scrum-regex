<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBOx\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
    const SYSTEM_CANNOT_FIND_THE_PATH_SPECIFIED = "The system cannot find the path specified.";
    const DESTINATION_IS_FILE = "The directory name is invalid.";

    private $destinationDirectory;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return ($numberOfParametersEntered == 0 || $numberOfParametersEntered == 1);
    }

    public function checkParameterValues(IOutputter $outputter) {    
        if($this->getParameterCount() > 0) {

            if($this->params[0] == "gaga"){
                $this->destinationDirectory = null;
                return true;
            }else if (strpos($this->params[0], ':') !== false) {
                $this->destinationDirectory = null;
                return true;
            }
            $this->destinationDirectory = $this->extractAndCheckIfValidDirectory($this->params[0], $this->getDrive(), $outputter);

            return $this->destinationDirectory!=null;
        } else {
            $this->destinationDirectory = null;
            return true;
        }
    }

    public function execute(IOutputter $outputter){
        if($this->getParameterCount() > 0) {
            if($this->params[0] == "gaga"){
                $outputter->printLine("Fatal error : Command rejected");  
            }else if (strlen($this->params[0]) == 8) {
            }
        }else{
            date_default_timezone_set("Asia/Bangkok");
            $outputter->printLine("Current time " . date("d-m-Y h:i:sa"));    
        }
    }
}