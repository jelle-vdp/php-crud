<?php

declare(strict_types=1);

class Group{
 private int $id;
 private string $name;
 private string $location;
 private int $teacherId;


    public function __construct (int $id, string $name, string $location, int $teacherId) {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
        $this->teacherId = $teacherId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return int
     */
    public function getTeacherId(): int
    {
        return $this->teacherId;
    }





}