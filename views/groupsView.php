<?php

    require("views/includes/header.php");

?>

<h1>Classes</h1>

<?php

    if(count($this->allGroups) === 0){
        echo "<p>No groups found</p>";
    } else {
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

    <p>Create a new group</p>
    <form action="?page=groups" method="post">
        <label for="group-name">Group name:</label>
        <input type="text" name="group-name" id="group-name">
        <label for="group-location">Group location:</label>
        <input type="text" name="group-location" id="group-location">
        <label for="group-teacher">Group teacher:</label>
        <select id="group-teacher" name="group-teacher">
            <?php foreach ($this->allGroups as $dataGroup) {
                $groupTeacherId = $dataGroup->getTeacherId();
                $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);
                echo "<option value='$groupTeacherId'>$groupTeacherName</option>";
            } ?>
        </select>
        <button type="submit" value="create">Create</button>
    </form>

<?php
    require("views/includes/footer.php");
?>