#!/bin/bash

# Run this script in the background, one per CPU core

while true; do
	php worker.php;
	sleep 2;
done
