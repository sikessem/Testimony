<?php declare(strict_types=1);

namespace Testimony;

class SingleValue {

  public function __construct(mixed $value) {

    $this->value = $value;
  }

  public function is(mixed $value, bool $strict = true): bool {

    return $strict? $this->value === $value: $this->value == $value;
  }

  public function isNot(mixed $value, bool $strict = true): bool {

    return !$this->is($value, $strict);
  }

  public function in(array $values, bool $strict = true): bool {

    foreach($values as $value)
      if($this->is($value, $strict))
        return true;
    return false;
  }

  public function notIn(array $values, bool $strict = true): bool {

    foreach($values as $value)
      if($this->is($value, $strict))
        return false;
    return true;
  }
}