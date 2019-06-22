<?php

namespace DOSBox\Filesystem;

abstract class FileSystemItem
{
    protected $name, $parent, $time;

    const ILLEGAL_ARGUMENT_TEXT = "Error: A file or directory name may not contain '/', '\', ',', ' ' or ':'";

    public function __construct($name, $parent, $time)
    {
        $this->name = $name;
        $this->parent = $parent;
        $this->time = $time;
    }

    public function getPath()
    {
        $path = "";

        if ($this->parent != null) {
            $path = $this->parent->getPath() . "\\" . $this->name;
        } else {
            // For root directory
            $path = $this->name;
        }

        return $path;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    protected static function checkName($name)
    {
        if (strstr($name, "\\") != false || strstr($name, "/") != false
            || strstr($name, ",") != false || strstr($name, " ") != false) {
            return false;
        }

        return true;
    }

    public function setName($newName)
    {
        if ($this->checkName($newName) == false) {
            throw new Exception(self::ILLEGAL_ARGUMENT_TEXT);
        }

        $this->name = $newName;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getName()
    {
        return $this->name;
    }

    abstract public function isDirectory();

    abstract public function getNumberOfContainedDirectories();

    abstract public function getNumberOfContainedFiles();

    abstract public function getSize();

    public function __toString()
    {
        return $this->getPath();
    }
}
