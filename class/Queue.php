<?php
class Queue
{
    public $arr = [];
    public $indexOfFront = 0;
    public $indexOfBack = 0;

    public function push($value)
    {
        $this->arr[$this->indexOfBack] = $value;
        $this->indexOfBack++;
    }

    public function pop()
    {
        if($this->empty())
            return -1;

        $value = $this->arr[$this->indexOfFront++];
        $this->arr[$this->indexOfFront-1] = null;
        unset($this->arr[$this->indexOfFront-1]);
        return $value;
    }

    public function size()
    {
        return $this->indexOfBack - $this->indexOfFront;
    }

    public function empty()
    {
        if($this->size() == 0)
            return 1;
        return 0;
    }

    public function front()
    {
        if($this->empty())
            return -1;
        return $this->arr[$this->indexOfFront];
    }

    public function back()
    {
        if($this->empty())
            return -1;
        return $this->arr[$this->indexOfBack - 1];
    }
}
?>