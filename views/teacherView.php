<?php

require("views/includes/header.php");
?>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
<?php
    foreach ($this->allTeachers as $dataTeacher) {
    $teacherName = ucfirst($dataTeacher->getName());
    $teacherID = $dataTeacher->getID();
    $teacherEmail = $dataTeacher->getEmail();
    echo '      <tr>
            <td> ' . $teacherName . '</td>
            <td>' . $teacherID . '</td>
            <td>' . $teacherEmail . '</td>
        </tr>';
}

?>
    </table>


<h1>Teachers</h1>


<?php require("views/includes/footer.php");