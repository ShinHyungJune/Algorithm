<?php
/*
    * 핵심
    큐를 짤 때 pop하고 나서 메모리할당해제를 해주지 않았었는데 이럴 경우 데이터의 수가 커질 때 메모리초과 오류가 뜸.
    안쓰는 공간은 꼭 할당해제해주자.
    $var = null;
    unset($var);
*/
    $queue = new Queue();

    // 1. 사람의 수와 제거되는 순서를 입력받는다.
    $input = fscanf(STDIN, "%d %d\n");
    list($numOfMen, $numOfOrder) = $input;

    echo "<";
    // 2. 사람의 수만큼 큐를 채운다.
    for($i=0; $i<$numOfMen; $i++)
        $queue->push($i);

    // 3. 사람의 수가 한명이 남을때까지 반복한다.
    while($queue->size() != 1){
        // 3.1. (제거되는 순서 - 1)만큼 반복한다.
        for($j=0; $j<$numOfOrder-1; $j++) {
            // 3.1.1. 맨 앞에 있는 사람을 빼낸 후 맨 뒤로 보낸다.
            $queue->push($queue->pop());
        }
        // 3.2. 사람을 제거한 후 제거된 사람을 출력한다.
        echo ($queue->pop()+1).", ";
    }
    echo ($queue->pop()+1).">";

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