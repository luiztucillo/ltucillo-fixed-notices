<?php

namespace LTucillo\Entities;

/**
 * Class Notice
 */
class Notice
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $userGroup;
    /**
     * @var
     */
    private $level;
    /**
     * @var
     */
    private $message;

    /**
     * Notice constructor.
     * @param $id
     * @param $userGroup
     * @param $level
     * @param $message
     */
    public function __construct(array $userGroup, $level, $message, $id = null)
    {
        $this->id = $id;
        $this->userGroup = $userGroup;
        $this->level = $level;
        $this->message = $message;
    }

    /**
     * @param array $data
     * @return Notice
     */
    static public function fromArray(array $data)
    {
        return new Notice($data['id'], $data['user_group'], $data['level'], $data['message']);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'user_group' => $this->userGroup,
            'level' => $this->level,
            'message' => $this->message
        ];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUserGroup($string = false)
    {
        if ($string) {
            return implode(',', $this->userGroup);
        }

        return $this->userGroup;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}
