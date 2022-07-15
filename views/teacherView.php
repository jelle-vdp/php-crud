<?php

require("views/includes/header.php");
?>

    <h1>Teachers</h1>
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

    </table>

    <form action="?page=teachers" method="post">
    <label for="teacher">Create a new teacher:</label><br>
    <input type="text" name="name" placeholder="Teacher's name"><br>
    <input type="text"  name="email" placeholder="teacher's email"><br>
    <button name="method" type="submit" value="create">Create</button>

    <?php
    if (isset($_POST["name"])) {
        var_dump($_POST);
    }    ?>


<?php require("views/includes/footer.php");