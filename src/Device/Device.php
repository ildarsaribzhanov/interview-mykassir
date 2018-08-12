<?php

namespace Interview\Device;


/**
 * Class Device
 * @package Interview
 */
class Device
{
    /** @var int */
    private $id;
    
    /**
     * Device constructor.
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