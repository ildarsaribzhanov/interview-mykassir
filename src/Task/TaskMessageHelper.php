<?php


namespace Interview\Task;


class TaskMessageHelper
{
    /** @var int */
    private $device_id;
    
    /** @var int */
    private $doc_id;
    
    public function __construct(int $device_id, int $doc_id)
    {
        $this->device_id = $device_id;
        $this->doc_id    = $doc_id;
    }
    
    /** @return string*/
    public function __toString()
    {
        return json_encode(['device' => $this->device_id, 'doc_num' => $this->doc_id]);
    }
}