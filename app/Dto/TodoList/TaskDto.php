<?php


namespace App\Dto\TodoList;

use \App\Dto\BaseDto;

class TaskDto extends BaseDto
{
    public $id;
    public $name;
    public $content;
    public $expectedDate;

}
