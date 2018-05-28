#!/bin/bash
set -e

php tests/dropdb.php
vendor/bin/propel sql:build --overwrite
vendor/bin/propel sql:insert
vendor/bin/phpunit

