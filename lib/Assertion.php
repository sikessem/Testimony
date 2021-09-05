<?php namespace SIKessEm\Tester;

abstract class Assertion {

  public function __construct() {

    self::$COUNT = 0;
  }

  protected static int $COUNT;
}