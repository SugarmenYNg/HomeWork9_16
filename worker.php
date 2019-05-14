<?php
declare(strict_type = 1);

class Worker implements EmployeeInterface
{
    //Коэффициент для работников добавляющий к их зарплате процент указанный в коэфициенте в зависимости от их выслуги лет
    /** @var float */
    private const FACTOR = 0.05;

    /** @var string */
    private $name;

    /** @var int */
    private $age;

    /** @var float */
    protected $salary;

    /** @var string */
    private $position;

    /** @var DateTimeInterface */
    private $dateStart;


    /**
     * Worker constructor.
     * @param string $name
     * @param int $age
     * @param float $salary
     * @param string $position
     * @param DateTimeInterface $dateStart
     */
    public function __construct(string $name, int $age, float $salary, string $position, DateTimeInterface $dateStart)
    {
        $this->name = $name;
        $this->setAge($age);
        $this->salary = $salary;
        $this->position = $position;
        $this->dateStart = $dateStart;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param int $age
     * @return $this
     */
    public function setAge(int $age)
    {
        if ($this->checkAge($age)) {
            $this->age = $age;
        }

        return $this;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param float $salary
     * @return $this
     */
    public function setSalary(float $salary)
    {
        $this->salary = $salary;

        return $this;
    }


    /**
     * @return float
     * @throws Exception
     */
    public function getSalary(): float
    {
        $count = 0;
        $countYears = $this->countYearsFromDateStart();

        if ($countYears > 2) {
            $count = $countYears - 1;
        }

        return floor($this->salary + ($this->salary * $count * self::FACTOR));
    }

    /**
     * @param int $age
     * @return bool
     */
    private function checkAge(int $age): bool
    {
        $result = false;
        if ($age >=1 && $age <= 100) {
            $result = true;
        }

        return $result;
    }

    /**
     * @param string $position
     * @return $this
     */
    public function setPosition(string $position)
    {
       $this->position = $position;

       return $this;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
       return $this->position;
    }

    /**
     * @param $dateStart
     * @return DateTimeInterface
     * @throws Exception
     */
    public function setStartDate($dateStart): DateTimeInterface
    {
        $date = new DateTime($dateStart);

        $date->format('Y-m-d');

        return $this->dateStart = $date;
    }

    /**
     * @return DateTimeInterface
     */
    public function getStartDate(): DateTimeInterface
    {
        return $this->dateStart;
    }

    /**
     * @return string
     * @throws Exception
     */
    private function countYearsFromDateStart() {
        $interval = $this->dateStart->diff(new DateTime());
        $countYears = $interval->format('%y');

        return $countYears;
    }
}
