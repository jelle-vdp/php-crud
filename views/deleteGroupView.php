// DELETE GROUP VIEW:
// - confirmation page where the user can confirm the deletion of the selected group

<?php 
    foreach ($this->allGroups as $dataGroup) {
        if($dataGroup->getId() === intval($get['delete'])){
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getId();
            $groupLocation = $dataGroup->getLocation();
            $groupTeacherId = $dataGroup->getTeacherId();
            $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);
            echo "<h1>Delete group $groupName</h1>";
            echo "<p>Are you sure you want to delete this group?</p>";
            echo "<p><a href='?page=groups&delete=$groupId&confirm=true'>Yes</a> <a href='?page=groups'>No</a></p>";
        }
    }