<?php
//Подключаем интерфейсы и классы их реализующие
require_once "EmployeeInterface.php";
require_once "worker.php";
require_once "ManagerInterface.php";
require_once "manager.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomeWork9_16</title>
</head>
<body>
<h2>Интерфейсы и наследование</h2>
<p>Создать интерфейс EmployeeInterface - который отвечает за работника компании, содержит методы - getName(),
    getSalery(), getPosition() (должность), getStartDate() (возвращаемая дата будет объект типа -
    DateTimeInterface).</p>

<p>Создать интерфейс ManagerInterface, в нем содержатся методы getEmployees(), addEmploye(EmployeeInterface $employe),
    getCountEmployees().</p>

<p>Из предыдущего задания взять класс Worker и добавить ему интерфейс EmployeInterface, необходимо добавить реализацию
    методов из интерфейса.</p>

<p>Создать класс Manager, он должен реализовать EmployeInterface и ManagerInterface.</p>

<p>Для класса Worker и Manager добавить при расчете к зарплате +5% за каждый год работы, начиная со второго года,
    например 1г - 0%, 2г - 5%, 3г - 10%, всегда округлять в меньшую сторону.</p>

<p>Для класса Manager, еще добавить при расчете к зарплате за каждого его сотрудника +2%.</p>

<p>Создать 2 объекта класса Manager для них задать даты начала работы: 2010-05-15 и 2017-06-30. И добавить для каждого
    по 3 работника. Вывести на экран имена и зарплаты менеджеров, а также количество подчиненных.</p>
<br>
<br>
<?php
//Создаем обьекты менеджеров
$manager1 = new Manager('Григорий', 38, 3560, 'Менеджер', new DateTime('2010-05-15'));
$manager2 = new Manager('Михаил', 29, 3560, 'Менеджер', new DateTime('2017-06-30'));

//Создаем обьекты работников и добавляем их к $manager1
$worker1 = new Worker('Иван', 24, 2320, 'Водитель', new DateTime('2017-06-30'));
$worker2 = new Worker('Василий', 28, 2100, 'Кладовщик', new DateTime('2017-06-30'));
$worker3 = new Worker('Николай', 32, 2650, 'Продавец', new DateTime('2010-05-15'));
$manager1->addEmployee($worker1);
$manager1->addEmployee($worker2);
$manager1->addEmployee($worker3);

//Создаем обьекты работников и добавляем их к $manager2
$worker4 = new Worker('Владимир', 45, 2320, 'Водитель', new DateTime('2010-05-15'));
$worker5 = new Worker('Дмитрий', 24, 2100, 'Кладовщик', new DateTime('2010-05-15'));
$worker6 = new Worker('Евгений', 29, 2650, 'Продавец', new DateTime('2017-06-30'));
$manager2->addEmployee($worker4);
$manager2->addEmployee($worker5);
$manager2->addEmployee($worker6);

//Выводим данные по менеджерам
printf(' У нас есть <b>%s</b> которого зовут <b>%s</b> и имеет зарплату <b>%s</b>, а также имеет в подчинении вот такое количество сотрудников <b>%s</b><br>', $manager1->getPosition(), $manager1->getName(), $manager1->getSalary(), $manager1->getCountEmployees());
printf(' У нас есть <b>%s</b> которого зовут <b>%s</b> и имеет зарплату <b>%s</b>, а также имеет в подчинении вот такое количество сотрудников <b>%s</b><br>', $manager2->getPosition(), $manager2->getName(), $manager2->getSalary(), $manager2->getCountEmployees());
?>
</body>
</html>

