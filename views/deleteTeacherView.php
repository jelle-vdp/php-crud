<?php

//for each loop to get all the data from the Teacher the user has selected
foreach ($this->allTeachers as $dataTeacher) {
    if ($dataTeacher->getId() === intval($post['delete'])) {
        $teacherName = ucfirst($dataTeacher->getName());
        $teacherId = $dataTeacher->getId();
        $teacherEmail = $dataTeacher->getEmail();

        echo "<h1>Delete teacher $teacherName</h1>";
        echo "<p>Are you sure you want to delete this teacher? </p>";
        echo " <form method='post'>
                        <!-- If the user confirms the delete, the teacher with id that is given in the value will be deleted from the database -->
                        <input type='hidden'name='delete' value='$teacherId'>
                        <button type='submit' name='confirm' value=true> yes, delete teacher</button>
                        <button type='submit' name='confirm' value=false> no </button>
                        </form>";

    }
}
