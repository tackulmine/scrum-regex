<?php

namespace DOSBox\Filesystem;

use DOSBox\Filesystem\FileSystemItem;

class File extends FileSystemItem
{
    private $content;

    public function __construct($name, $content)
    {
        parent::__construct($name, null, date("d/m/Y h:i:s"));
        $this->content = $content;
    }

    // Adding File and Directory using the same method.
    public function add(FileSystemItem $fileSystemItemToAdd)
    {
        array_push($this->content, $fileSystemItemToAdd);
        if (!$this->hasAnotherParent($fileSystemItemToAdd)) {
            $this->removeParent($fileSystemItemToAdd);
        }
        $fileSystemItemToAdd->setParent($this);
    }

    public function getFileContent()
    {
        return $this->content;
    }

    public function isDirectory()
    {
        return false;
    }

    public function getSize()
    {
        return strlen($this->content);
    }

    public function getNumberOfContainedFiles()
    {
        return 0; // A file does not contain any other files
    }

    public function getNumberOfContainedDirectories()
    {
        return 0; // A file does not contain any sub-directories
    }
}
