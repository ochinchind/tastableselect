<?php

// учебные планы
$studyPlan = [
    [
        // подходит для студентов id: 1,2
        'id' => 1,
        'program_id' => 1,
        'year_id' => 19,
        'spec_id' => 101,
        'actual' => true,
    ],
    [
        // подходит для студентов id: 3
        'id' => 2,
        'program_id' => 1,
        'year_id' => 19,
        'spec_id' => 102,
        'actual' => true,
    ],
    [
        // подходит для студентов id: 4
        'id' => 3,
        'program_id' => 2,
        'year_id' => 19,
        'spec_id' => 201,
        'actual' => true,
    ],
    [
        // подходит для студентов id: 5
        'id' => 4,
        'program_id' => 2,
        'year_id' => 18,
        'spec_id' => 202,
        'actual' => true,
    ],
    [
        // нет подходящих студентов
        'id' => 5,
        'program_id' => 2,
        'year_id' => 17,
        'spec_id' => 201,
        'actual' => true,
    ],
];

// студенты
$studentList = [
    [
        // подходящий учебный план id: 1
        'id' => 1,
        'name' => 'User 1',
        'program_id' => 1,
        'year_id' => 19,
        'spec_id' => 101,
        'actual' => true,
    ],
    [
        // подходящий учебный план id: 1
        'id' => 2,
        'name' => 'User 2',
        'program_id' => 1,
        'year_id' => 19,
        'spec_id' => 101,
        'actual' => true,
    ],
    [
        // подходящий учебный план id: 2
        'id' => 3,
        'name' => 'User 3',
        'program_id' => 1,
        'year_id' => 19,
        'spec_id' => 102,
        'actual' => true,
    ],
    [
        // подходящий учебный план id: 3
        'id' => 4,
        'name' => 'User 4',
        'program_id' => 2,
        'year_id' => 19,
        'spec_id' => 201,
        'actual' => true,
    ],
    [
        // подходящий учебный план id: 4
        'id' => 5,
        'name' => 'User 5',
        'program_id' => 2,
        'year_id' => 18,
        'spec_id' => 202,
        'actual' => true,
    ],
    [
        // нет подходящего учебного плана
        'id' => 6,
        'name' => 'User 6',
        'program_id' => 2,
        'year_id' => 19,
        'spec_id' => 202,
        'actual' => true,
    ],
    [
        // нет подходящего учебного плана
        'id' => 7,
        'name' => 'User 7',
        'program_id' => 2,
        'year_id' => 18,
        'spec_id' => 201,
        'actual' => true,
    ],
    [
        // нет подходящего учебного плана
        'id' => 8,
        'name' => 'User 8',
        'program_id' => 2,
        'year_id' => 18,
        'spec_id' => 201,
        'actual' => true,
    ],
    [
        // нет подходящего учебного плана и не нужен
        'id' => 9,
        'name' => 'User 9',
        'program_id' => 2,
        'year_id' => 19,
        'spec_id' => 203,
        'actual' => false,
    ],
];

/*
 по входящим данным можно увидеть что:
    1) у студентов и учебных планов есть общие поля
    2) соответствие учебного плана к студенту определяется общими полями: program_id, year_id, spec_id
    3) студенты с id: 6,7,8,9 не имеют подходящего учебного плана
    4) студенты с id: 9 не актуальны, поэтому им не нужен учебный план
*/

/*
 1) напишите эффективный код который бы вернул массив уникальных учебных планов
 которые требуется создать чтобы все актульные студенты имели
 подходящий им учебный план
 2) оцените эффективность вашего алгоритма: O(1) / O(log n) / O(n) / O(n*log n) / O(n^2) / O(n^3) / O(2^n) / O(n!) / O(n^n)
 3) написали ли вы самый эффективный код решающий эту задачу? можно ли написать этот код лучше или хуже?
*/

// ожидаемый результат вашего кода
$result = [
    [
        // подходит для студентов id: 6
        'program_id' => 2,
        'year_id' => 19,
        'spec_id' => 202,
    ],
    [
        // подходит для студентов id: 7,8
        'program_id' => 2,
        'year_id' => 18,
        'spec_id' => 201,
    ],
];


$users = [
    [
        'id' => 1,
        'name' => "Андрей"
    ],
    [
        'id' => 2,
        'name' => "Борис"
    ],
    [
        'id' => 3,
        'name' => "Анна"
    ],
    [
        'id' => 4,
        'name' => "Антон"
    ],
    [
        'id' => 5,
        'name' => "Максим"
    ],
    [
        'id' => 6,
        'name' => "Лена"
    ],
];

$positions = [
    [
        'id' => 1,
        'name' => "Стажер"
    ],
    [
        'id' => 2,
        'name' => "Техник"
    ],
    [
        'id' => 3,
        'name' => "Специалист"
    ],
    [
        'id' => 4,
        'name' => "Программист"
    ],
];

$salaries = [
    [
        'id' => 1,
        'date' => new DateTime('2001-01-01'),
        'user_id' => 1, 
        'position_id' => 4,
        'salary' => 9500
    ],
    [
        'id' => 2,
        'date' => new DateTime('2001-01-01'),
        'user_id' => 2, 
        'position_id' => 1,
        'salary' => 500
    ],
    [
        'id' => 3,
        'date' => new DateTime('2001-01-01'),
        'user_id' => 3, 
        'position_id' => 3,
        'salary' => 4500
    ],
    [
        'id' => 4,
        'date' => new DateTime('2001-01-01'),
        'user_id' => 4, 
        'position_id' => 3,
        'salary' => 4000
    ],
    [
        'id' => 5,
        'date' => new DateTime('2001-02-01'),
        'user_id' => 5, 
        'position_id' => 4,
        'salary' => 7500
    ],
    [
        'id' => 6,
        'date' => new DateTime('2001-02-01'),
        'user_id' => 2, 
        'position_id' => 2,
        'salary' => 2000
    ],
    [
        'id' => 7,
        'date' => new DateTime('2001-02-01'),
        'user_id' => 6, 
        'position_id' => null,
        'salary' => 5000
    ],
    [
        'id' => 8,
        'date' => new DateTime('2001-02-01'),
        'user_id' => 6, 
        'position_id' => 3,
        'salary' => 0
    ],
];