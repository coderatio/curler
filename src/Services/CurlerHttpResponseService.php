<?php
namespace Coderatio\Curler\Services;

class CurlerHttpResponseService
{
    public $headers = [];
    public $statusCode;
    public $text = '';

    public function __construct($statusCode, $headers, $text)
    {
        $this->statusCode = $statusCode;
        $this->headers = $headers;
        $this->text = $text;
    }

    /**
     * Transforms response to string
     *
     * @return string
     */
    public function __toString()
    {
        return $this->text;
    }

    /**
     * Gets text as json
     *
     * @return string
     */
    public function asJson(): string
    {
        return json_encode($this->asArray());
    }

    /**
     * Gets text as object
     *
     * @return mixed
     */
    public function asObject()
    {
        return json_decode($this->text, false);
    }

    /**
     * Gets text as array
     *
     * @return array
     */
    public function asArray(): array
    {
        return json_decode($this->text, true);
    }
}

