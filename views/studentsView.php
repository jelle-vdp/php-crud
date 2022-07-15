<?php

require("views/includes/header.php");
?>

<h1>Students</h1>

<?php

    if(count($this->allStudents) === 0){
        echo "<p>No students found</p>";
    } else {
        echo "<table><thead><tr><th>Id</th><th>Name</th><th>e-mail</th><th>group_id</th></tr></thead><tbody>";

        foreach ($this->allStudents as $dataStudent) {
            $studentName = ucfirst($dataStudent->getName());
            $studentId = $dataStudent->getID();
            $studentEmail = $dataStudent->getEmail();
            $studentGroupId = $dataStudent->getGroupId();
            echo "<tr><td>$studentId</td><td>$studentName</td><td>$studentEmail</td><td>$studentGroupId</td></tr>";
        }
    echo "</tbody></table>";
    }
?>



<?php require("views/includes/footer.php");

?>

