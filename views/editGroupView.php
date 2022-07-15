<?php

    
    foreach ($this->allGroups as $dataGroup) {
        if($dataGroup->getId() === intval($get['edit'])){
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getId();
            $groupLocation = $dataGroup->getLocation();
            $groupTeacherId = $dataGroup->getTeacherId();
            $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);
            echo "<h1>Edit group $groupName</h1>";
            echo "<form method='get'><input type='hidden' name='page' value='groups'><input type='hidden' name='group-id' value='$groupId'><label for='name'>Name</label><input id='name' name='rename' type='text' value='$groupName'><label for='location'>Location</label><input id='location' name='location' type='text' value='$groupLocation'><label for='teacher'><select id='teacher' name='teacher'><option value='$groupTeacherId'>$groupTeacherName</option>";
        }

        if($dataGroup->getId() !== intval($get['edit'])){
            $groupTeacherId = $dataGroup->getTeacherId();
            $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);
            echo '<option value="'.$groupTeacherId.'">'.$groupTeacherName.'</option>';
        }

    }

    echo "</select><button type='submit'>Edit</button></form>";