<?php

class phpform {

    public static function isPostBack() {
        if (isset($_POST) && count($_POST) > 0) {
            return true;
        }

        return false;
    }

    public static function valRequired() {
        return "required";
    }

    public static function valEmail() {
        return "email";
    }

    public static function valEmailRequired() {
        return "required email";
    }

}