<?php
// The source code for this was from the YouTube Tutorial:
// "Projects In PHP | Creating A Job Lister Website From Scratch | Eduonix"
// https://www.youtube.com/watch?v=LEkjrQMmIK0

// Our Group used this class to create our template pages.
class Template{
    // PATH TO TEMPLATE
    protected $template;

    // VARS PASSED IN
    protected $vars = array();

    // Constructor
    public function __construct($template) {
        $this->template = $template;
    }

    public function __get($key) {
        return $this->vars[$key];
    }

    public function __set($key, $value) {
        $this->vars[$key] = $value;
    }

    public function __toString() {
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();

        include basename($this->template);

        return ob_get_clean();
    }
}