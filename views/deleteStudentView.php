<?php


foreach ($this->allStudents as $dataStudent) {
    if ($dataStudent->getId() === intval($post['delete'])) {
        $studentName = ucfirst($dataStudent->getName());
        $studentId = $dataStudent->getID();
        $studentEmail = $dataStudent->getEmail();
        $studentGroupId = $dataStudent->getGroupId();


        echo "<h1>Delete student $studentName</h1>";
        echo "<p>Are you sure you want to delete this student? </p>";
        echo " <form method='post'>
                        <input type='hidden'name='delete' value='$studentId'>
                        <button type='submit' name='confirm' value=true> yes, delete student</button>
                        <button type='submit' name='confirm' value=false> no </button>
                        </form>

<p><a href='?page=students&delete=$studentId&confirm=true'>Yes</a> <a href='?page=students'>No</a></p>";
    }
}
