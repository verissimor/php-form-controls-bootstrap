<?php

class pfcb_control_input_text extends pfcb_control {

    protected function getType() {
        return "input";
    }

    protected function setup() {
        $this->control->set("type", "text");
        $this->control->classAdd("required");
    }

}

