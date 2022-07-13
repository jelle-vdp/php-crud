<?php 
    class CoachesController {
        public function render($get, $post) {
            require("views/includes/header.php");
            require("views/coachesView.php");
            require("views/includes/footer.php");
        }
    }