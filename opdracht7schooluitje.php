<?php

// Namespace toevoegen
namespace SchoolTrip;

// Abstracte klasse Person
abstract class Person
{
    // Properties in het Engels met lowerCamelCase en bepaalde visibility en datatype
    protected $name;

    // Constructor wordt gebruikt
    public function __construct($name)
    {
        $this->name = $name;
    }

    // Getter om naam op te halen
    public function getName(): string
    {
        return $this->name;
    }

    // Abstracte methode role
    abstract public function role(): string;
}

// Student klasse die van Person erft
class Student extends Person
{
    // Properties in het Engels met lowerCamelCase en bepaalde visibility en datatype
    private $class;
    private $hasPaid;

    // Constructor wordt gebruikt
    public function __construct($name, $class)
    {
        parent::__construct($name);
        $this->class = $class;
        $this->hasPaid = false;
    }

    // Getter om klas op te halen
    public function getClass(): string
    {
        return $this->class;
    }

    // Getter om te controleren of student heeft betaald
    public function hasPaid(): bool
    {
        return $this->hasPaid;
    }

    // Setter om betaalstatus in te stellen
    public function setPaid(bool $paid): void
    {
        $this->hasPaid = $paid;
    }

    // Implementeer de abstracte methode role
    public function role(): string
    {
        return "Student";
    }
}

// Teacher klasse die van Person erft
class Teacher extends Person
{
    // Constructor wordt gebruikt
    public function __construct($name)
    {
        parent::__construct($name);
    }

    // Implementeer de abstracte methode role
    public function role(): string
    {
        return "Teacher";
    }
}

// SchoolTripList klasse
class SchoolTripList
{
    // Array van objecten om deelnemers bij te houden
    private $participants = [];

    // Methode om een deelnemer toe te voegen
    public function addParticipant($person): void
    {
        $this->participants[] = $person;
    }

    // Methode om deelnemers op te halen
    public function getParticipants(): array
    {
        return $this->participants;
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

echo "Participants:\n";
foreach ($participants as $participant) {
    if ($participant instanceof Student) {
        echo $participant->getName() . " - " . $participant->getClass() . " - " . ($participant->hasPaid() ? "Paid" : "Not Paid") . "\n";
    } else {
        echo $participant->getName() . " (Teacher)\n";
    }
}

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
