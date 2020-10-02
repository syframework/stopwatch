<?php
namespace Sy;

class Stopwatch {

	private $times;

	private $startTimes;

	public function __construct() {
		$this->times      = array();
		$this->startTimes = array();
	}

	/**
	 * Return times array
	 *
	 * @return array
	 */
	public function getTimes() {
		return $this->times;
	}

	/**
	 * Return a time record
	 *
	 * @return double
	 */
	public function getTime($id = 0) {
		if (!isset($this->times[$id])) return 0;
		return $this->times[$id];
	}

	/**
	 * Start time record
	 *
	 * @param string $id time record identifier
	 */
	public function start($id = 0) {
		$this->startTimes[$id] = microtime(true);
	}

	/**
	 * Stop time record
	 *
	 * @param string $id time record identifier
	 */
	public function stop($id = 0) {
		if (!isset($this->startTimes[$id])) return;
		$end = microtime(true);
		$this->times[$id] = $this->getTime($id) + $end - $this->startTimes[$id];
	}

	/**
	 * Reset time record
	 *
	 * @param string $id time record identifier
	 */
	public function reset($id = 0) {
		$this->times[$id] = 0;
	}

}