<?php
declare(strict_types=1);

//loop to get all information of the teacher the user wants to edit
foreach ($this->allTeachers as $dataTeacher) {
    if($dataTeacher->getId() === intval($post['edit'])){
        $teacherName = ucfirst($dataTeacher->getName());
        $teacherId = $dataTeacher->getId();
        $teacherEmail = $dataTeacher->getEmail();

        echo "<h1>Edit teacher $teacherName</h1>";
        echo "<form method='post'><input type='hidden' name='page' value='teacher'><input type='hidden' name='id' value='$teacherId'><label for='name'>Name</label><input id='name' name='rename' type='text' value='$teacherName'><label for='email'>Email</label><input id='email' name='email' type='text' value='$teacherEmail'>";
    }
}

echo "</select><button type='submit'>Edit</button></form>";