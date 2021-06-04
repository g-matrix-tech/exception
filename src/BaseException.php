<?php

declare(strict_types=1);

namespace GMatrixTech\Exception;

use Exception;
use Throwable;

/**
 * Class BaseException
 * @package Ms\Exception
 */
class BaseException extends Exception
{
    /**
     * @var int|mixed
     */
    protected $code;

    /**
     * @var array $message
     */
    protected $message;

    /**
     * BaseException constructor.
     * @param $message
     * @param int $code
     * @param Throwable|null $previous
     * @throws Exception
     */
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        if (!in_array(gettype($message), ['string', 'array'])) {
            throw new Exception('The exception message must be of type array or string');
        }

        if (is_string($message) && $this->isJson($message)) {
            $message = json_decode($message, true);
        }

        $this->message = $message;

        $this->code = $code;

        $message = json_encode(
            $this->gatherExceptionInfo()
        );

        parent::__construct($message, $this->code, $previous);
    }

    /**
     * @param $string
     * @return bool
     */
    protected function isJson($string): bool
    {
        json_decode($string, true);

        return (json_last_error() === JSON_ERROR_NONE);
    }

    /**
     * @return array
     */
    protected function gatherExceptionInfo(): array
    {
        if (is_array($this->message)) {
            return [
                'currentService' => $this->message['currentService'] ?? '',
                'code' => $this->message['code'] ?? 0,
                'file' => $this->message['file'] ?? '',
                'line' => $this->message['line'] ?? 0,
                'message' => $this->message['message'] ?? '',
            ];
        }

        return [
            'currentService' => $this->getCurrentService(),
            'code' => $this->getCode(),
            'file' => $this->file,
            'line' => $this->getLine(),
            'message' => $this->message,
        ];
    }

    /**
     * @return string
     */
    protected function getCurrentService(): string
    {
        return isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : '';
    }
}
