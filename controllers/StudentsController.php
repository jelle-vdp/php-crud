<?php 
    class StudentsController {
        public function render($get, $post) {
            require("views/includes/header.php");
            require("views/studentsView.php");
            require("views/includes/footer.php");
        }
    }