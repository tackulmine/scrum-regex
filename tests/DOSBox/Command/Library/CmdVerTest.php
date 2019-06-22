<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Command\Library\CmdVer;
use DOSBox\Filesystem\Drive;

class CmdVerTest extends DOSBoxTestCase
{
    private $command;
    private $drive;

    protected function setUp()
    {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdVer("ver", $this->drive);

        $this->commandInvoker->addCommand($this->command);

    }

    public function testCmdVer_WithoutAnyParameters()
    {
        // when
        $this->executeCommand("ver");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), CmdVer::OS_VER);
    }

    public function testCmdVer_WithExactParameter()
    {
        $labelContent = CmdVer::OS_VER;
        $labelContent .= implode("\n", CmdVer::DEVS);
        // when
        $this->executeCommand("ver /w");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $labelContent);
    }

}
