<?php declare(strict_types=1);

namespace Testimony;

abstract class Assertion {

  public function __construct() {

    self::$COUNT = 0;
  }

  protected static int $COUNT;
}