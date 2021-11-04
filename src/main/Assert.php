<?php declare(strict_types=1);

namespace Testimony;

class Assert {

  public static function that(mixed $value, mixed ...$values): SingleValue|SeveralValues {

    return empty($values)? self::singleValue($value): self::severalValues($value, ...$values); 
  }

  public static function singleValue(mixed $value): SingleValue {

    return new SingleValue($value);
  }

  public static function severalValues(mixed ... $values): SeveralValues {

    return new SeveralValues(...$values);
  }
}