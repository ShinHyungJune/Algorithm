<!--
문제
정수를 저장하는 스택을 구현한 다음, 입력으로 주어지는 명령을 처리하는 프로그램을 작성하시오.

명령은 총 다섯 가지이다.

push X: 정수 X를 스택에 넣는 연산이다.
pop: 스택에서 가장 위에 있는 정수를 빼고, 그 수를 출력한다. 만약 스택에 들어있는 정수가 없는 경우에는 -1을 출력한다.
size: 스택에 들어있는 정수의 개수를 출력한다.
empty: 스택이 비어있으면 1, 아니면 0을 출력한다.
top: 스택의 가장 위에 있는 정수를 출력한다. 만약 스택에 들어있는 정수가 없는 경우에는 -1을 출력한다.
-->

<?php

class Stack
{
    public $arr = [];

    public $size = 0;

    function push($value)
    {
        $this->arr[$this->size] = $value;
        $this->size += 1;
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
}

$stack = new Stack();

// 1. 명령어의 개수를 입력받는다.
$num = trim(fgets(STDIN, 4096));

// 2. 명령어의 개수만큼 반복한다.
for($i=0; $i<$num; $i++){
    // 2.1. 명령어를 입력받는다.
    $input = trim(fgets(STDIN, 4096));
    sscanf($input, "%s %d",$command, $value);

    // 2.2. 명령어를 수행한 후 결과를 출력한다.
    switch($command){
        case "push":
            echo $stack->push($value);
            break;
        case "pop":
            echo $stack->pop()."\n";
            break;
        case "top":
            echo $stack->top()."\n";
            break;
        case "size":
            echo $stack->size()."\n";
            break;
        case "empty":
            echo $stack->empty()."\n";
            break;
    }
}
?>
