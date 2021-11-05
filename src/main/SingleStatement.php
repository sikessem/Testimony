<?php declare(strict_types=1);

namespace Testimony;

class SingleStatement {

  public function __construct(mixed $statement) {

    $this->statement = $statement;
  }

  public function is(mixed $statement, bool $strict = true): bool {

    return $strict? $this->statement === $statement: $this->statement == $statement;
  }

  public function isNot(mixed $statement, bool $strict = true): bool {

    return !$this->is($statement, $strict);
  }

  public function in(array $statements, bool $strict = true): bool {

    foreach($statements as $statement)
      if($this->is($statement, $strict))
        return true;
    return false;
  }

  public function notIn(array $statements, bool $strict = true): bool {

    foreach($statements as $statement)
      if($this->is($statement, $strict))
        return false;
    return true;
  }
}