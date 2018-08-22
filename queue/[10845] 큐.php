<?php
    /*
     * 문제
    정수를 저장하는 큐를 구현한 다음, 입력으로 주어지는 명령을 처리하는 프로그램을 작성하시오.

    명령은 총 여섯 가지이다.

    push X: 정수 X를 큐에 넣는 연산이다.
    pop: 큐에서 가장 앞에 있는 정수를 빼고, 그 수를 출력한다. 만약 큐에 들어있는 정수가 없는 경우에는 -1을 출력한다.
    size: 큐에 들어있는 정수의 개수를 출력한다.
    empty: 큐가 비어있으면 1, 아니면 0을 출력한다.
    front: 큐의 가장 앞에 있는 정수를 출력한다. 만약 큐에 들어있는 정수가 없는 경우에는 -1을 출력한다.
    back: 큐의 가장 뒤에 있는 정수를 출력한다. 만약 큐에 들어있는 정수가 없는 경우에는 -1을 출력한다.

    */

    $queue = new Queue();
    // 1. 명령어의 수를 입력 받는다.
    $input = fscanf(STDIN,"%d\n");
    list($num) = $input;

    // 2. 명령어의 수만큼 반복한다.
    for($i=0; $i<$num; $i++){
        // 2.1. 명령어를 입력받는다.
        $input = fscanf(STDIN, "%s %d\n");
        list($command, $value) = $input;

        // 2.2. 명령어를 수행한다.
        switch($command){
            case "push":
                $queue->push($value)."\n";
                break;
            case "pop":
                echo $queue->pop()."\n";
                break;
            case "size":
                echo $queue->size()."\n";
                break;
            case "empty":
                echo $queue->empty()."\n";
                break;
            case "front":
                echo $queue->front()."\n";
                break;
            case "back":
                echo $queue->back()."\n";
                break;
        }
    }

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