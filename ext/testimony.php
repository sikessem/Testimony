<?php declare(strict_types=1);

namespace Testimony;

if(!function_exists('\Testimony\testify')) {
  function testify(int $argc, array $argv): void {
    Program::execute($argc, $argv);
  }
}