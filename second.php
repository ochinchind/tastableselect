<?php 
include 'dev_check.php';
$userNames = array_column($users, 'name', 'id');
$positionNames = array_column($positions, 'name', 'id');

// Фильтруем записи без должности или зарплаты
$salaries = array_filter($salaries, function ($salary) {
    return $salary['position_id'] !== null && $salary['salary'] !== 0;
});

// Группируем записи по пользователям
$userSalaries = [];
foreach ($salaries as $salary) {
    $bool = False;
    $salary_id = $salary['id'];
    $salary_date = $salary['date'];
    
    $userId = $salary['user_id'];
    $positionId = $salary['position_id'];
    $salarySalary = $salary['salary'];
    $filteredUser = array_filter($users, function ($user) use ($userId) {
        return $user['id'] == $userId;
    });
    $filteredPosition = array_filter($positions, function ($position) use ($positionId) {
        return $position['id'] == $positionId;
    });
    $filterSalary = [
        'id' => $salary_id,
        'date' => $salary_date,
        'user_name' => reset($filteredUser)['name'],
        'position_name' => reset($filteredPosition)['name'],
        'salary' => $salarySalary
    ];
    for ($i = 0; $i < count($userSalaries); $i++) {

        if ($userSalaries[$i]['id'] == $userId) {
            $da = $userSalaries[$i]['date'];
            if($userSalaries[$i]['date'] < $salary_date){
                unset($userSalaries[$i]);
                array_push($userSalaries,$filterSalary);
                $bool = True;
                
                break;
            } else{
                $bool = True;
                
                break;
            }
        }
    }
    if(!$bool){
        array_push($userSalaries,$filterSalary);
    }
}

// Сортируем записи по убыванию зарплаты
usort($userSalaries, function($a, $b){
    return $b['salary'] - $a['salary'];
});
/*
// Оставляем только последнюю запись для каждого пользователя
$userSalaries = array_map(function ($salaries) {
    return array_reduce($salaries, function ($carry, $salary) {
        return $carry['date'] > $salary['date'] ? $carry : $salary;
    });
}, $userSalaries);
*/
// Выводим таблицу с результатами
echo '<table>';
echo '<thead><tr><th>id</th><th>date</th><th>user_name</th><th>position_name</th><th>salary</th></tr></thead>';
echo '<tbody>';
foreach ($userSalaries as $salary) {
    $salaryId = $salary['id'];
    $salaryDate = $salary['date'];
    $stringDate = $salaryDate->format('Y-m-d');
    $userName = $salary['user_name'];
    $positionName = $salary['position_name'];
    $salaryAmount = $salary['salary'];
    echo "<tr><td>$salaryId</td><td>$stringDate</td><td>$userName</td><td>$positionName</td><td>$salaryAmount</td></tr>";
}
echo '</tbody>';
echo '</table>';


?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Main Page</title>
</head>
<button class="btn btn-primary btn-lg px-4" onclick="window.location.href='index.php'">Go back</button>