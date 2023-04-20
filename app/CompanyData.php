<?php

namespace App;

use Carbon\Carbon;

class CompanyData
{
    private string $name;
    private string $type;
    private string $address;
    private int $regNr;
    private string $registerDate;
    private ?string $terminated;
    private Carbon $carbon;
    public function __construct(
        string  $name,
        string  $type,
        string  $address,
        int     $regNr,
        string  $registerDate,
        ?string $terminated
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->address = $address;
        $this->regNr = $regNr;
        $this->registerDate = $registerDate;
        $this->terminated = $terminated;
        $this->carbon = new Carbon();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getRegisterDate(): string
    {
        return $this->carbon->toFormattedDateString($this->registerDate);
    }

    public function getRegNr(): int
    {
        return $this->regNr;
    }

    public function getTerminated(): ?string
    {
        return $this->carbon->toFormattedDateString($this->terminated);
    }
}