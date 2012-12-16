<?php

class phpform_control_input_email extends phpform_control_input_text {

    protected function setup() {
        parent::setup();
        $this->control->set("type", "email");
        return $this;
    }

    public function newControl($name, $value = "", $pfcbValidator = "") {
        return new phpform_control_input_email($name, $value, $pfcbValidator);
    }

}