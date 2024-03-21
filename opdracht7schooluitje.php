<?php

abstract class Person
{
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Student extends Person
{
    private $class;
    private $hasPaid;

    public function __construct($name, $class)
    {
        parent::__construct($name);
        $this->class = $class;
        $this->hasPaid = false;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function hasPaid()
    {
        return $this->hasPaid;
    }

    public function setPaid($paid)
    {
        $this->hasPaid = $paid;
    }
}

class Teacher extends Person
{
    public function __construct($name)
    {
        parent::__construct($name);
    }
}

class SchoolTripList
{
    private $participants = [];

    public function addParticipant($person)
    {
        $this->participants[] = $person;
    }

    public function getParticipants()
    {
        return $this->participants;
    }

    public function getNumberOfParticipants()
    {
        return count($this->participants);
    }

    public function calculateNumberOfTeachers()
    {
        $numberOfStudents = count(array_filter($this->participants, function ($participant) {
            return $participant instanceof Student;
        }));

        return floor($numberOfStudents / 5);
    }
}

// Test code
$student1 = new Student("John", "Class A");
$student2 = new Student("Alice", "Class A");
$student3 = new Student("Bob", "Class B");
$student4 = new Student("Emma", "Class B");

$teacher1 = new Teacher("Mr. Smith");

$student1->setPaid(true);
$student2->setPaid(true);
$student3->setPaid(false);
$student4->setPaid(true);

$list = new SchoolTripList();
$list->addParticipant($student1);
$list->addParticipant($student2);
$list->addParticipant($student3);
$list->addParticipant($student4);
$list->addParticipant($teacher1);

$participants = $list->getParticipants();
$numberOfTeachers = $list->calculateNumberOfTeachers();

echo "Participants:\n";
foreach ($participants as $participant) {
    if ($participant instanceof Student) {
        echo $participant->getName() . " - " . $participant->getClass() . " - " . ($participant->hasPaid() ? "Paid" : "Not Paid") . "\n";
    } else {
        echo $participant->getName() . " (Teacher)\n";
    }
}

echo "\nNumber of teachers needed: " . $numberOfTeachers . "\n";

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schooluitje deelnemers</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Schooluitje deelnemers</h2>
    <table>
        <thead>
            <tr>
                <th>Docent/Student</th>
                <th>Klas</th>
                <th>Betaald</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Koningstein</td>
                <td>Piet</td>
                <td>sod2a</td>
                <td>Nee</td>
            </tr>
            <tr>
                <td></td>
                <td>Jan</td>
                <td>sod2a</td>
                <td>Ja</td>
            </tr>
            <tr>
                <td></td>
                <td>Kees</td>
                <td>sod2b</td>
                <td>Ja</td>
            </tr>
            <tr>
                <td>Brugge</td>
                <td>Klaas</td>
                <td>sod2b</td>
                <td>Ja</td>
            </tr>
            <tr>
                <td></td>
                <td>Mohammed</td>
                <td>sod2a</td>
                <td>Nee</td>
            </tr>
            <tr>
                <td></td>
                <td>Eefje</td>
                <td>sod2b</td>
                <td>Ja</td>
            </tr>
            <tr>
                <td>Drimmelen</td>
                <td>Martijn</td>
                <td>sod2b</td>
                <td>Nee</td>
            </tr>
            <tr>
                <td></td>
                <td>Pieter</td>
                <td>sod2a</td>
                <td>Ja</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
