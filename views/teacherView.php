<?php

require("views/includes/header.php");

foreach ($this->allTeachers as $dataTeacher) {
    $teacherName = ucfirst($dataTeacher->getName());
    $teacherID = $dataTeacher->getID();
    $teacherEmail = $dataTeacher->getEmail();
    echo $teacherName . " has Coach ID: " . $teacherID ."and their email-adress is: " . $teacherEmail . "<br>";
}

?>



<h1>Teachers</h1>


<?php require("views/includes/footer.php");