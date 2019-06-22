<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Command\Library\CmdHelp;
use DOSBox\Filesystem\Drive;

class CmdHelpTest extends DOSBoxTestCase
{
    private $command;
    private $drive;

    protected function setUp()
    {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdHelp("help", $this->drive);

        $this->commandInvoker->addCommand($this->command);
    }

    public function testCmdHelp_WithoutAnyParameters()
    {
        // when
        $this->executeCommand("help");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), implode("\n", CmdHelp::HELP_CONTENTS));
    }

    public function testCmdHelp_WithExactParameter()
    {
        $labelContent = CmdHelp::HELP_CONTENTS['label'];
        // when
        $this->executeCommand("help label");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $labelContent);
    }

    public function testCmdHelp_WithFalseParameter_ReportsError()
    {
        $errorContent = CmdHelp::HELP_ERROR;
        // when
        $this->executeCommand("help bla");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $errorContent);
    }

}
