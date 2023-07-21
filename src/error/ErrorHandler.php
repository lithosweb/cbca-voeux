<?php

namespace v\error;

use ErrorException;
use Throwable;

class ErrorHandler
{

  public static function mainHandler()
  {
    // $i = 
    return error_reporting(0);
    // return $i;
    // if ($i != 22527) {
    //   http_response_code(500);
    //   echo "<h2>Server internal error</h2>";
    //   echo "<h4><a href='/connexion'>Go home</a></h4>";
    // }
    // var_dump($i);
  }

  public static function handleException(Throwable $exception): void
  {
    http_response_code(500);

    echo json_encode([
      "code" => $exception->getCode(),
      "message" => $exception->getMessage(),
      "file" => $exception->getFile(),
      "line" => $exception->getLine()
    ]);
  }

  public static function handleError(
    int $errno,
    string $errstr,
    string $errfile,
    int $errline
  ): bool {
    throw new ErrorException(
      $errstr,
      0,
      $errno,
      $errfile,
      $errline
    );
  }
}
