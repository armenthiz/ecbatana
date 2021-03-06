<?php

class Autoload
{
    private $class;

    private $sourceDir = '../src/';

    public function __construct()
    {

    }

    private function loadClass($class)
    {
        $class = $this->sourceDir . $class . '.php';
        $this->class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        if ($this->checkExist($this->class) === true) {
            require_once($this->class);
        }
    }

    private function checkExist($class)
    {
        return file_exists($class) ? true : false;
    }

    public function run()
    {
        try {
            spl_autoload_register(array($this, 'loadClass'));
        } catch (Exception $e) {
            echo "Error Sighted on line " . $e->getFile() . "<br/>";
            echo "Message " . $e->getMessage() . "<br/>";
        }
    }
}