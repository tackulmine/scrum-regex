<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Filesystem\Directory;
use DOSBox\Command\Library\CmdHelp;
use DOSBox\Filesystem\Drive;

class CmdHelpTest extends DOSBoxTestCase {
    private $command;
    private $drive;

    protected function setUp() {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdHelp("help", $this->drive);

        $this->commandInvoker->addCommand($this->command);
    }

    public function testCmdHelp_WithoutAnyParameters() {
        $helpContent = 'CD Displays the name of or changes the current directory.';
        $helpContent .= 'DIR Displays a list of files and subdirectories in a directory.';
        $helpContent .= 'EXIT Quits the CMD.EXE program (command interpreter).';
        $helpContent .= 'FORMAT Formats a disk for use with Windows.';
        $helpContent .= 'HELP Provides Help information for Windows commands.';
        $helpContent .= 'LABEL Creates, changes, or deletes the volume label of disk.';
        $helpContent .= 'MKDIR Creates a directory';
        $helpContent .= 'MKFILE Created a file.';
        $helpContent .= 'MOVE Moves one or more files from one directory to another directory.';

        // when
        $this->executeCommand("help");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $helpContent);
    }

    public function testCmdHelp_WithExactParameter() {
        $labelContent = 'LABEL Creates, changes, or deletes the volume label of disk.';
        // when
        $this->executeCommand("help label");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $labelContent);
    }

    public function testCmdHelp_WithFalseParameter_ReportsError(){
        $errorContent = 'This command is not supported by the help utility.';
        // when
        $this->executeCommand("help bla");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $errorContent);
    }

}