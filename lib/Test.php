<?php namespace SIKessEm\Tester;

class Test {
  
  public function __construct(string $file) {

    if(!is_file($file))
      throw new Error("No such file $file");

    if(!is_readable($file))
      throw new Error("Cannot read $file");
  
    $this->file = $file;
  }

  protected string $file;

  public function run(): void {

    require $this->file;
  }
}