<?php
declare(strict_type = 1);

class Manager extends Worker implements EmployeeInterface, ManagerInterface
{
    //Коэффициент для Менеджеров добавляющий к их зарплате процент указанный в коэфициенте от их зарплаты в зависимости
    //от количества сотрудников этого менеджера
    /** @var float  */
    private const FACTOR = 0.02;

    /** @var array | EmployeeInterface [] */
    private $employees;

    /**
     * @return array
     */
    public function getEmployees(): array
    {
        return $this->employees;
    }

    /**
     * @param EmployeeInterface $employee
     */
    public function addEmployee(EmployeeInterface $employee): void
    {
        $this->employees[] = $employee;
    }

    /**
     * @return int
     */
    public function getCountEmployees(): int
    {
        return count($this->employees);
    }

    /**
     * @return float
     * @throws Exception
     */
    public function getSalary(): float
    {
        return floor(parent::getSalary() + ($this->salary * $this->getCountEmployees() * self::FACTOR));
    }

    /**
     * Функция удаления работника из массива работников (повторил как показывали при разборе домашней работы)
     *
     * @param EmployeeInterface $employee
     */
    public function deleteEmployee(EmployeeInterface $employee): void
    {
        $keyUnsetElement = array_search($employee, $this->employees);

        if (is_int($keyUnsetElement)) {
            unset($this->employees[$keyUnsetElement]);
        }
    }

    /**
     * Функция удаления работника по его имени из массива работников (повторил как показывали при разборе
     * домашней работы)
     *
     * @param string $name
     */
    public function deleteEmployeeByName(string $name): void
    {
        $this->employees = array_filter($this->employees, function (EmployeeInterface $employee) use ($name) {
            return $employee->getName() !== $name;
        });
    }
}
