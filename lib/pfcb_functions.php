<?php

class pfcb {

    public static function isPostBack() {
        if (isset($_POST) && count($_POST) > 0) {
            return true;
        }

        return false;
    }

}