<?php declare(strict_types=1);

namespace SIKessEm\Testimony;

if(!function_exists('\SIKessEm\Testimony\testify')) {
  function testify(int $argc, array $argv): void {
    Program::execute($argc, $argv);
  }
}