<?php

/* http://davidwalsh.name/create-html-elements-php-htmlelement-class */

class phpform_html_element {
    /* vars */

    var $type;
    private $attributes;
    private $classes = array();
    var $self_closers;

    /**
     * Construct new object html element
     * <p>new pfcb_html_element("a")</p>
     * @param string $type Type of element e.g input, a, br, link, meta, p, ul
     * @param string $self_closers Tags that are automatically closed
     */
    function __construct($type, $self_closers = array('input', 'img', 'hr', 'br', 'meta', 'link')) {
        $this->type = strtolower($type);
        $this->self_closers = $self_closers;

        return $this;
    }

    /**
     * Return the value of attribute 
     * <p>$html->get('href'); <br />//out: http://www.google.com</p>
     * @param string $attribute The attribute to return
     * @return string
     */
    function get($attribute) {
        if (isset($this->attributes[$attribute]))
            return $this->attributes[$attribute];
        else
            return "";
    }

    /**
     * Set a parameter. You can use:
     * <p>$my_anchor->set('href','http://www.google.com.br');</p>
     * Or:
     * <p>$my_anchor->set(array('href' => 'http://www.google.com.br', 'class' => 'current');</p>
     * @param type $attribute
     * @param type $value
     */
    function set($attribute, $value = '') {
        if (!is_array($attribute)) {
            if ($attribute == 'class')
                die("To manipulate class use classAdd, classRemove");

            $this->attributes[$attribute] = $value;
        } else {
            foreach ($attribute as $key => $value) {
                $this->set($key, $value);
            }
        }

        return $this;
    }

    /**
     * Remove attribute
     * @param string $att
     */
    function remove($attribute) {
        if (isset($this->attributes[$attribute])) {
            unset($this->attributes[$attribute]);
        }

        return $this;
    }

    /**
     * Clear all attributes
     */
    function clearAllAttributes() {
        $this->attributes = array();

        return $this;
    }

    /**
     * Add a class to Css Class element attribute
     * @param string $className Name of CssClass
     */
    function classAdd($className) {
        if (strpos($className, ' ') !== false) {
            $classes = explode(' ', $className);
            foreach ($classes as $className) {
                $this->classAdd($className);
            }
        }

        if (!empty($className) && !in_array($className, $this->classes)) {
            $this->classes[] = $className;
        }

        return $this;
    }

    /**
     * Remove a class
     * @param string $className Name of CssClass
     */
    function classRemove($className) {
        if (($key = array_search($className, $this->classes)) !== false) {
            unset($this->classes[$key]);
        }

        return $this;
    }

    /**
     * Inject a object pfcb_html_element into current pfcb_html_element.
     * <p>$my_anchor->inject($img_html_element);</p> 
     * @param type $object
     */
    function inject($html) {
        if (isset($this->attributes['text'])) {
            $this->attributes['text'].= $html;
        } else {
            $this->attributes['text'] = $html;
        }

        return $this;
    }

    /**
     * Return the html rendered element
     * @return string
     */
    function output($echo = false) {
        //start
        $build = '<' . $this->type;

        //add attributes
        if (count($this->attributes)) {
            foreach ($this->attributes as $key => $value) {
                if ($key != 'text' && $key != 'checked' && $key != 'selected' && $key != 'disabled' && $key != 'readonly') {
                    $build.= ' ' . $key . '="' . $value . '"';
                } elseif ($key == 'checked' || $key == 'selected' || $key == 'disabled' || $key == 'readonly') {
                    $build .= ' ' . $key;
                }
            }
        }

        //classes
        if (isset($this->classes) && is_array($this->classes)) {
            $build .= ' class="' . join(" ", $this->classes) . '"';
        }

        //closing
        if (!in_array($this->type, $this->self_closers)) {
            if (isset($this->attributes['text']))
                $build.= '>' . $this->attributes['text'] . '</' . $this->type . '>';
            else
                $build.= '></' . $this->type . '>';
        } else {
            $build.= ' />';
        }

        //Return
        if ($echo) {
            echo $build;
            return $this;
        } else {
            return $build;
        }
    }

    public function __toString() {
        return $this->output();
    }

}