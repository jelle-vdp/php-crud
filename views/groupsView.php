<?php

    require("views/includes/header.php");

?>

<h1>Classes</h1>

<?php

    if(count($this->allGroups) === 0){
        echo "<p>No groups found</p>";
    } else {
        echo "<table><thead><tr><th>Name</th><th>Location</th><th>Teacher</th></tr></thead><tbody>";

        foreach ($this->allGroups as $dataGroup) {
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getID();
            $groupLocation = $dataGroup->getLocation();
            $groupTeacherId = $dataGroup->getTeacherId();

            echo "<tr><td>$groupName</td><td>$groupLocation</td><td>$groupTeacherId</td></tr>";
        }

        echo "</tbody></table>";
    }

    require("views/includes/footer.php");

?>