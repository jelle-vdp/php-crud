<?php

    foreach ($this->allGroups as $dataGroup) {

        if(strtolower($dataGroup->getName()) === $get['class']){
            $groupName = ucfirst($dataGroup->getName());
            $groupId = $dataGroup->getId();
            $groupLocation = ucfirst($dataGroup->getLocation());
            $groupTeacherId = $dataGroup->getTeacherId();
            $groupTeacherName = ucfirst($dataGroup->getTeacherName($groupTeacherId));
            echo "<h1>Group: $groupName</h1>";
            echo "<p>$groupName is based in $groupLocation and has $groupTeacherName as teacher.</p>";
        }
    }