<?php declare(strict_types=1);

namespace SIKessEm\Testimony;

class SeveralStatements {

  public function __construct(mixed ...$statements) {

    $this->statements = $statements;
  }

  protected array $statements = [];

  public function equal(mixed ...$statements): bool {

    foreach ($this->statements as $key => $statement)
      if(!isset($statements[$key]) || $statements[$key] !== $statement)
        return false;
    return true;
  }

  public function equiv(mixed ...$statements): bool {

    if(count($statements) !== count($this->statements)) return false;

    foreach ($this->statements as $statement)
      if(!in_array($statement, $statements, true))
        return false;
    return true;
  }

  public function have(mixed $statement, bool $strict = true): bool {

    return in_array($statement, $this->statements, $strict);
  }

  public function are(mixed $statement, bool $strict = true): bool {

    foreach($this->statements as $_statement)
      if($strict ? $statement !== $_statement: $statement != $_statement)
        return false;
    return true;
  }
}