<?php

class Stack
{
    public $arr = [];

    public $size = 0;

    function push($value)
    {
        for($i = 0; $i<strlen($value); $i++){
            $this->arr[$this->size] = $value[$i];
            $this->size += 1;
        }
    }

    function pop()
    {
        if($this->empty())
            return -1;

        $this->size -= 1;
        return $this->arr[$this->size];
    }

    function empty()
    {
        if ($this->size == 0)
            return 1;
        return 0;
    }

    function size()
    {
        return $this->size;
    }

    function top()
    {
        if($this->empty())
            return -1;

        return $this->arr[$this->size - 1];
    }

    function clear()
    {
        return $this->size = 0;
    }
}

?>