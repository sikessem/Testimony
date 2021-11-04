<?php declare(strict_types=1);

namespace Testimony;

class Tester {
  
  public function __construct(string $file) {

    if(!is_file($file))
      throw new Error("No such file $file");

    if(!is_readable($file))
      throw new Error("Cannot read $file");
  
    $this->file = $file;
  }

  protected string $file;

  public function test(): void {

    require $this->file;
  }
}