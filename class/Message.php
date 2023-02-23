<?php
class Message
{
    public $username;
    public $message;
    public $date;


    public function __construct(string $username, string $message, DateTime $date = null)
    {
        $this->username = $username;
        $this->message = $message;
        $this->date = $date;
    }

    public function isValid(): bool
    {
    }
    public function getErrors(): array
    {
    }
    public function toHTML(): string
    {
    }
    public function toJSON(): string
    {
    }
    public static function fromJSON(): string
    {
    }
}
