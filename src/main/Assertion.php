<?php declare(strict_types=1);

namespace SIKessEm\Testimony;

abstract class Assertion {

  public function __construct() {

    self::$COUNT = 0;
  }

  protected static int $COUNT;
}