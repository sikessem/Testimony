<?php 

namespace Testimony;

class Program {
    public static function execute(int $argc, array $argv): void {
        try {
            $testsrc_data = [];
            if (is_file($testsrc_file = getcwd() . DIRECTORY_SEPARATOR . '.testsrc')) {
                $testsrc_data = json_decode(file_get_contents($testsrc_file), true);
                if (json_last_error()) {
                    fprintf(
                        STDERR,
                        json_last_error_msg() . ' in %s' . PHP_EOL,
                        $testsrc_file
                    );
                    exit(1);
                }
            }

            $dirs = (array) ($testsrc_data['dirs'] ?? '');
            $files = (array) ($testsrc_data['files'] ?? '');

            foreach($dirs as $dir) {
                if(is_dir($dir)) {
                    $dir_files = scandir($dir);
                    foreach($dir_files as $dir_file) {
                        if(!in_array($dir_file, ['.', '..'])) {
                            foreach($files as $file) {
                                if(fnmatch($file, $dir_file)) {
                                    (new Tester($dir . DIRECTORY_SEPARATOR . $dir_file))->test();
                                    break;
                                }
                            }
                        }

                    }
                }
            }
        } catch(\Throwable $e) {
            self::send_exception($e);
        }
    }

    public static function put_error(string $message, ...$args) {
        fwrite(STDERR, (empty($args)? $message: sprintf($message, ...$args)) . PHP_EOL);
    }

    public static function send_error(string $message, ...$args) {
        self::put_error($message, ...$args);
        exit(1);
    }

    public static function send_exception(\Throwable $e) {
        self::put_error($e->getMessage());
    }
}