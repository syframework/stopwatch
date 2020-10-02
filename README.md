# sy/stopwatch

Utility class for timing

## Installation

Install the latest version with

```bash
$ composer require sy/stopwatch
```

## Basic Usage

```php
<?php

use Sy\Stopwatch;

$stopwatch = new Stopwatch();

// Start timing
$this->stopwatch->start();

// Process to be timed
for ($i = 0; $i < 100000; $i++) {
	// Do something...
}

// Stop timing
$this->stopwatch->stop();

// Retrieve time in seconds
$time = $stopwatch->getTime();
echo "Execution time: $time seconds";
```

## Advanced Usage

You can add a specific **label** for each timer.

After a **stop**, you **start** the stopwatch again, the time will be added to timer. Otherwise you have to **reset** the stopwatch.

Example:

```php
<?php

use Sy\Stopwatch;

$stopwatch = new Stopwatch();

for ($i = 0; $i < 10; $i++) {
	
	// Start timing process A
	$this->stopwatch->start('A');
	
	// Process A
	for ($a = 0; $a < 1000; $a++) {
		// Do something...
	}

	// Stop timing process A
	$this->stopwatch->stop('A');

	// Start timing process B
	$this->stopwatch->start('B');

	for ($b = 0; $b < 1000; $b++) {
		// Do something...
	}

	// Stop timing process B
	$this->stopwatch->stop('B');
}

// Retrieve time
$timeA = $stopwatch->getTime('A');
$timeB = $stopwatch->getTime('B');
```