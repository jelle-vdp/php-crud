// MAIN GROUPS VIEW:
// - a table of all groups in the database with an edit and delete button next to each group
// - a standalone form to add a new group

<?php
    require("views/includes/header.php");
?>

<h1>Classes</h1>

<?php
    // show a message when there are no groups in the database
    if(count($this->allGroups) === 0){
        echo "<p>No groups found</p>";
    } 
    // else create table with all groups, including an edit / delete button for each seperate entity
    else {
        echo "<table><thead><tr><th>Name</th><th>Location</th><th>Teacher</th><th></th></tr></thead><tbody>";

        foreach ($this->allGroups as $dataGroup) {
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getId();
            $groupLocation = $dataGroup->getLocation();
            $groupTeacherId = $dataGroup->getTeacherId();
            $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);

            echo "<tr><td>$groupName</td><td>$groupLocation</td><td>$groupTeacherName</td>";
            echo "<td><a href='?page=groups&delete=$groupId'>Delete</a> <a href='?page=groups&edit=$groupId'>Edit</a></td></tr>";
        }

        echo "</tbody></table>";
    }

    ?>

    // function to create a new group //
    <p>Create a new group</p>
    <form method="get">
        <input type="hidden" name="page" value="groups">
        <input type="hidden" name="group-new" value="true">
        <label for="group-name">Group name:</label>
        <input type="text" name="group-name" id="group-name">
        <label for="group-location">Group location:</label>
        <input type="text" name="group-location" id="group-location">
        <label for="group-teacher">Group teacher:</label>
        <select id="group-teacher" name="group-teacher">
            <?php foreach ($this->allTeachers as $teacher) {
                $teacherId = $teacher->getId();
                $teacherName = $teacher->getName($teacherId);
                echo "<option value='$teacherId'>$teacherName</option>";
            } ?>
        </select>
        <button type="submit" value="create">Create</button>
    </form>

<?php
    require("views/includes/footer.php");
?>