<?php 
    class GroupsController {
        public function render($get, $post) {
            require("views/includes/header.php");
            require("views/groupsView.php");
            require("views/includes/footer.php");
        }
    }