<?php


foreach ($this->allStudents as $dataStudent) {
    if($dataStudent->getId() === intval($post['edit'])){
        $studentName = ucfirst($dataStudent->getName());
        $studentId = $dataStudent->getID();
        $studentEmail = $dataStudent->getEmail();
        $studentGroupId = $dataStudent->getGroupId();
        echo "<h1>Edit student $studentName</h1>";
        echo "<form method='post'>
                <input type='hidden' name='page' value='students'>
                <input type='hidden' name='student-id' value='$studentId'>
                <label for='name'>Name</label>
                <input id='name' name='name' type='text' value='$studentName'>
                <label for='location'>Location</label>
                <input id='email' name='email' type='text' value='$studentEmail'>
                
                ";
    }



}

echo "<button type='submit' name='editStudent'>Edit</button></form>";
