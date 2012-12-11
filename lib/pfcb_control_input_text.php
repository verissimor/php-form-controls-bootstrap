<?php

/**
 * @property pfcb_html_element $label
 * @property pfcb_html_element $divControl_group
 * @property pfcb_html_element $divControls
 */
class pfcb_control_input_text extends pfcb_control {

    public $label;
    public $divControl_group;
    public $divControls;
    protected $append = "";
    protected $prepend = "";

    protected function getType() {
        return "input";
    }

    protected function setup() {
        $this->control->set("type", "text");
        return $this;
    }

    public function Append($append) {
        $this->append .= $append;
        return $this;
    }

    public function Prepend($prepend) {
        $this->prepend .= $prepend;
        return $this;
    }

    public function getHtmlControl() {
        $control = $this->prepend . parent::getHtmlControl() . $this->append;

        $this->divControls->inject($control);
        $this->divControl_group->inject($this->label);
        $this->divControl_group->inject($this->divControls);

        return $this->divControl_group->output();
    }

    public function __construct($name, $value = "", $validator = "", $label = "") {
        $this->label = new pfcb_html_element("label");
        $this->label->classAdd("control-label");
        $this->label->set("text", $label);
        $this->label->set("for", $name);

        $this->divControl_group = new pfcb_html_element("div");
        $this->divControl_group->classAdd("control-group");

        $this->divControls = new pfcb_html_element("div");
        $this->divControls->classAdd("controls");

        parent::__construct($name, $value, $validator);
    }

}

