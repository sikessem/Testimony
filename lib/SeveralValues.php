<?php namespace SIKessEm\Tester;

class SeveralValues {

  public function __construct(mixed ...$values) {

    $this->values = $values;
  }

  protected array $values = [];

  public function equal(mixed ...$values): bool {

    foreach ($this->values as $key => $value)
      if(!isset($values[$key]) || $values[$key] !== $value)
        return false;
    return true;
  }

  public function equiv(mixed ...$values): bool {

    if(count($values) !== count($this->values)) return false;

    foreach ($this->values as $value)
      if(!in_array($value, $values, true))
        return false;
    return true;
  }

  public function have(mixed $value, bool $strict = true): bool {

    return in_array($value, $this->values, $strict);
  }

  public function are(mixed $value, bool $strict = true): bool {

    foreach($this->values as $_value)
      if($strict ? $value !== $_value: $value != $_value)
        return false;
    return true;
  }
}