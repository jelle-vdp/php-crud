<?php

require("views/includes/header.php");
?>

<h1>Students</h1>

<?php

    if(count($this->allStudents) === 0){
        echo "<p>No students found</p>";
    } else {
        echo "<table><thead><tr><th>Id</th><th>Name</th><th>e-mail</th><th>group_id</th<th>group</th><!--<th>teacher</th>--></tr></thead><tbody>";


        foreach ($this->allStudents as $dataStudent) {
            $studentName = ucfirst($dataStudent->getName());
            $studentId = $dataStudent->getID();
            $studentEmail = $dataStudent->getEmail();
            $studentGroupId = $dataStudent->getGroupId();
            $studentGroupName = $dataStudent->getGroupName($studentGroupId);
           /* $studentTeacher = $dataStudent->getStudentTeacher($studentGroupId);*/


            echo "<tr>
                    <td>$studentId</td>
                    <td>$studentName</td>
                    <td>$studentEmail</td>
                    <td>$studentGroupId</td>
                    <td>$studentGroupName</td>
                    <td> 
                        <form method='post'>
                        <button type='submit' name='delete' value=$studentId> delete student</button>
                        </form>
                    </td>
                    <td>
                        <form method='post'>
                        <button type='submit' name='edit' value=$studentId> edit student</button>
                        </form>
                    </td>
                  </tr>";
        }
    echo "</tbody></table><br><br>";
    }
?>


<!-- form to edit the students-->

<form action="?page=students" method="post">
    <label for="student"><b>Create a new student:</b></label><br><br>
    <input type="text" name="name" placeholder="name">
    <input type="text"  name="email" placeholder="email"><br><br>
    <button name="createStudent" type="submit" value="create">Create</button>
</form>











<?php require("views/includes/footer.php");

?>

