<?php
declare(strict_types=1);

class Student extends Teacher
{

    private int $groupId;


    public function __construct(int $id, string $name, string $email, int $groupId)
    {parent:: __construct($id, $name, $email);
        $this->groupId = $groupId;
    }

    public function render ($get, $post){

    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

}