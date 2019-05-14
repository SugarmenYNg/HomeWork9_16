<?php
declare(strict_type = 1);

interface EmployeeInterface
{
    /** @return string */
    public function getName(): string;

    /** @return float */
    public function getSalary(): float;

    /** @return string */
    public function getPosition(): string;

    /** @return DateTimeInterface */
    public function getStartDate(): DateTimeInterface;
}
