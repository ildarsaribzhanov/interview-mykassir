<?php

namespace Interview\Document;


/**
 * Class Document
 * @package Interview
 */
class Document
{
    /** @var int */
    private $id;
    
    /**
     * Document constructor.
     *
     * @param int|null $id
     */
    public function __construct(?int $id = null)
    {
        $this->id = $id ?? rand(1, 10);
    }
    
    
    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }
}