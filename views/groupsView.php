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

    require("views/includes/footer.php");

?>