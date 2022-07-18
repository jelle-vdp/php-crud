// EDIT GROUP VIEW:
// - a form to edit the selected group with the current values inserted by default

<?php
    foreach ($this->allGroups as $dataGroup) {
        if($dataGroup->getId() === intval($get['edit'])){
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getId();
            $groupLocation = $dataGroup->getLocation();
            $groupTeacherId = $dataGroup->getTeacherId();
            $previousTeacherId = $groupTeacherId;
            $groupTeacherName = $dataGroup->getTeacherName($groupTeacherId);
            echo "<h1>Edit group $groupName</h1>";
            echo "<form method='get'><input type='hidden' name='page' value='groups'><input type='hidden' name='group-id' value='$groupId'><label for='name'>Name</label><input id='name' name='rename' type='text' value='$groupName'><label for='location'>Location</label><input id='location' name='location' type='text' value='$groupLocation'><label for='teacher'><select id='teacher' name='teacher'><option value='$groupTeacherId'>$groupTeacherName</option>";
            foreach ($this->allTeachers as $teacher) {                
                if($teacher->getId() !== intval($previousTeacherId)){
                    $teacherId = $teacher->getId();
                    $teacherName = $teacher->getName($groupTeacherId);
                    echo '<option value="'.$teacherId.'">'.$teacherName.'</option>';
                }
            }
        }
    }
    echo "</select><button type='submit'>Edit</button></form>";