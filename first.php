<?php
include 'dev_check.php';

$result = [];

foreach ($studentList as $student) {

    // Пропускаем неактуальных студентов
    if (!$student['actual']) {
        continue;
    }
    /*Чекаем если все нужные поля одинаковые. 
    Если такое совпадение есть хотя бы с одним учебным планом, то продолжится цикл. 
    Если нет совпадений, то пытаемся добавить в результат
    */
    if(!array_filter($studyPlan, 
    function ($plan) use ($student){
        return (
        $plan['program_id'] === $student['program_id'] &&
        $plan['year_id'] === $student['year_id'] &&
        $plan['spec_id'] === $student['spec_id']);
    })){
        // Берем нужные значения создавая новый массив
        $newplan = [
            'program_id' => $student['program_id'],
            'year_id'=> $student['year_id'],
            'spec_id'=>$student['spec_id']
        ];
        //Если такого значения нет то добавляем в результат
        if (!in_array($newplan, $result)) {
            array_push($result, $newplan);
        }
    }
}

/*мой алгоритм имеет эффективность O(n*m*z) , 
то есть n = количество листа студентов, 
m = количество учебных планов, 
z = количество результатов
потому что array_filter имеет эффективность O(m)
а так же in_array имеет эффективность O(z)

я бы мог написать получше на другом языке например использовав map или set из c++ в которых и так хранятся уникальные значения
Но я не смог найти более быстрого решения на php 


*/
?>


<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>first</title>
</head>
<body>
<div class="col-lg-8 mx-auto p-4 py-md-5">
    <button class="btn btn-primary btn-lg px-4" onclick="window.location.href='index.php'">Go back</button>
    <?php
        $i = 1;
        foreach($result as $res){
            echo "<h1> Study plan № $i: </h1>";
            $program_id = $res['program_id'];
            echo "<p> Program id: $program_id </p>";
            $year_id = $res['year_id'];
            echo "<p> Year id: $year_id </p>";
            $spec_id = $res['spec_id'];
            echo "<p> Specialisation id: $spec_id </p>";
            $i++;
        }
    ?>

</div>
</body>
</html>


