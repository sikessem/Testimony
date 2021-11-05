<?php declare(strict_types=1);

namespace SIKessEm\Testimony;

class Assert {

  public static function that(mixed $statement, mixed ...$statements): SingleStatement|SeveralStatements {
    return empty($statements)? self::singleStatement($statement): self::severalStatements($statement, ...$statements); 
  }

  protected static function singleStatement(mixed $statement): SingleStatement {
    return new SingleStatement($statement);
  }

  protected static function severalStatements(mixed ... $statements): SeveralStatements {
    return new SeveralStatements(...$statements);
  }
}