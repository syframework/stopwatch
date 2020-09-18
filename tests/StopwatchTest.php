<?php

use PHPUnit\Framework\TestCase;
use Sy\Stopwatch;

class StopwatchTest extends TestCase {

	protected $stopwatch;

	protected function setUp() : void {
		$this->stopwatch = new Stopwatch();
	}

	public function testTimeRecord() {
		$this->stopwatch->start();
		sleep(1);
		$this->stopwatch->stop();
		$this->assertEquals(1, (int) $this->stopwatch->getTime());
	}

	public function testTimeRecordWithLabel() {
		$this->stopwatch->start();
		sleep(1);
		$this->stopwatch->stop();
		$this->stopwatch->start('foo');
		$this->stopwatch->start('bar');
		sleep(2);
		$this->stopwatch->stop('foo');
		sleep(1);
		$this->stopwatch->stop('bar');
		$this->assertEquals(1, (int) $this->stopwatch->getTime());
		$this->assertEquals(2, (int) $this->stopwatch->getTime('foo'));
		$this->assertEquals(3, (int) $this->stopwatch->getTime('bar'));
	}

}