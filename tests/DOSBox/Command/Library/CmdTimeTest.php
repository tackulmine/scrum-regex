<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Command\Library\CmdTime;
use DOSBox\Filesystem\Drive;

class CmdTimeTest extends DOSBoxTestCase
{
    private $command;
    private $drive;

    protected function setUp()
    {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdTime("time", $this->drive);

        $this->commandInvoker->addCommand($this->command);
    }

    public function testCmdTime_WithoutAnyParameters()
    {
        // when
        $this->executeCommand("time");
        // then
        date_default_timezone_set("Asia/Bangkok");
        $this->assertEquals($this->mockOutputter->getOutput(), "Current time " . date("d-m-Y h:i:sa"));
    }

    public function testCmdTime_WithExactParameter()
    {
        // when
        $this->executeCommand("time 21:30:10");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), '');
    }

    public function testCmdTime_WithFalseParameter_ReportsError()
    {
        $errorContent = CmdTime::TIME_ERROR;
        // when
        $this->executeCommand("time gaga");
        // then
        $this->assertEquals($this->mockOutputter->getOutput(), $errorContent);
    }

}
