<?php namespace SIKessEm\Tester;

if(!function_exists('\SIKessEm\Tester\assert_that')) {

  function assert_that(mixed $value, mixed ...$values): SingleValue|SeveralValues {

    return Assert::that($value, ...$values);
  }
}

if(!function_exists('\SIKessEm\Tester\test')) {

  function test(string $file): Test {

    return new Test($file);
  }
}

if(!function_exists(('\SIKessEm\Tester\put_error'))) {

  function put_error(string $message, ...$args) {

    fputs(STDERR, (empty($args)? $message: sprintf($message, ...$args)) . PHP_EOL);
  }
}

if(!function_exists(('\SIKessEm\Tester\send_error'))) {

  function send_error(string $message, ...$args) {

    put_error($message, ...$args);
    exit(1);
  }
}

if(!function_exists(('\SIKessEm\Tester\send_exception'))) {

  function send_exception(\Throwable $e) {

    put_error($e->getMessage());
  }
}