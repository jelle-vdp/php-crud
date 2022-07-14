<?php

require("views/includes/header.php");

foreach ($this->allStudents as $dataStudent) {
    $studentName = ucfirst($dataStudent->getName());
    $studentId = $dataStudent->getID();
    $studentEmail = $dataStudent->getEmail();
    $studentGroupId= $dataStudent->getGroupId();
    echo $studentName . " has Id: " . $studentId .",  email-adress is: " . $studentEmail . ", and 
    the group-id is:". $studentGroupId."<br>" ;
}

?>

<h1>Students</h1>

<?php require("views/includes/footer.php");

?>

