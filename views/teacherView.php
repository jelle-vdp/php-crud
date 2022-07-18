<?php

require("views/includes/header.php");
?>

    <h1>Teachers</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>ID</th>
            <th>Email</th>
            <th>Group</th>
        </tr>
<?php

//foreach loops that creates a new row with the data of the teacher
foreach ($this->allTeachers as $dataTeacher) {
    //gets the teacher information
    $teacherName = ucfirst($dataTeacher->getName());
    $teacherID = $dataTeacher->getID();
    $teacherEmail = $dataTeacher->getEmail();
    $groupName = $dataTeacher->getGroupNameFromTeacher();

    //echoes the teacher information in the table
        echo '      <tr>
            <td> ' . $teacherName . '</td>
            <td>' . $teacherID . '</td>
            <td>' . $teacherEmail . '</td>
            <td> ' . $groupName . '</td>
            <!-- Edit and Delete buttons, with teacher id of corresponding teachers -->
        <td> 
        <form method="post">
        <button type="submit" name="delete" value='. $teacherID .' >Delete Teacher</button>
        </form>
        </td>
        <td>
        <form method="post">
        <button type="submit" name="edit" value= ' . $teacherID  . ' >Edit Teacher</button>
        </form>
        </td>
        </tr>';
    }

?>
    </table>
    </table>
    <!-- From to add a new teacher -->
    <form action="?page=teachers" method="post">
    <label for="teacher">Create a new teacher:</label><br>
    <input type="text" name="name" placeholder="Teacher's name"><br>
    <input type="text"  name="email" placeholder="teacher's email"><br>
        <button name="method" type="submit" value="create">Create</button>

<?php require("views/includes/footer.php");