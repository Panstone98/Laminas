<?php

declare(strict_types=1);

namespace Webimpress\SafeWriter\Exception;

use RuntimeException as PhpRuntimeException;
use Throwable;

use function sprintf;

final class ChmodException extends PhpRuntimeException implements ExceptionInterface
{
    /**
     * @param string $message
     * @param int $code
     */
    private function __construct($message = '', $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @internal
     */
    public static function unableToChangeChmod(string $file) : self
    {
        return new self(sprintf('Could not change chmod of the file "%s"', $file));
    }
}
