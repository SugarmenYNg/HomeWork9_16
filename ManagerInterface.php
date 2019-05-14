<?php
declare(strict_type = 1);

interface ManagerInterface
{
    /** @return array */
    public function getEmployees(): array;

    /** @param EmployeeInterface $employee */
    public function addEmployee(EmployeeInterface $employee): void;

    /** @return int */
    public function getCountEmployees(): int;
}
