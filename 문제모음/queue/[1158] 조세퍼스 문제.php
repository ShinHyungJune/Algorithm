<?php
/*
    # 문제
    조세퍼스 문제는 다음과 같다.
    1번부터 N번까지 N명의 사람이 원을 이루면서 앉아있고, 양의 정수 M(≤ N)이 주어진다. 이제 순서대로 M번째 사람을 제거한다. 한 사람이 제거되면 남은 사람들로 이루어진 원을 따라 이 과정을 계속해 나간다. 이 과정은 N명의 사람이 모두 제거될 때까지 계속된다. 원에서 사람들이 제거되는 순서를 (N, M)-조세퍼스 순열이라고 한다. 예를 들어 (7, 3)-조세퍼스 순열은 <3, 6, 2, 7, 5, 1, 4>이다.
    N과 M이 주어지면 (N,M)-조세퍼스 순열을 구하는 프로그램을 작성하시오.

    # 핵심
    1) 메모리 할당해제
    큐를 짤 때 pop하고 나서 메모리할당해제를 해주지 않았었는데 이럴 경우 데이터의 수가 커질 때 메모리초과 오류가 뜸.
    안쓰는 공간은 꼭 할당해제해주자.
    $var = null;
    unset($var);

    2) 반복출력금지
    반복문안에 출력문을 넣어 매 반복마다 출력을 하면 수행시간이 엄청 길어짐.
    출력할 내용을 저장만하고 결과출력은 맨 마지막에 한 번만 해야함.

    3) php함수를 마냥 신뢰하지 않기
    array_push, array_pop 등 php함수를 쓰니 직접 짠거보다 느림.
*/

$queue = new Queue();
$result = "";

// 1. 사람의 수와 제거되는 순서를 입력받는다.
$input = fscanf(STDIN, "%d %d\n");
list($numOfMen, $numOfOrder) = $input;

echo "<";
// 2. 사람의 수만큼 큐를 채운다.
for($i=0; $i<$numOfMen; $i++)
    $queue->push($i);

$start = get_time();
// 3. 사람의 수가 한명이 남을때까지 반복한다.
while($numOfMen-- != 1){
    // 3.1. (제거되는 순서 - 1)만큼 반복한다.
    for($j=0; $j<$numOfOrder-1; $j++) {
        // 3.1.1. 맨 앞에 있는 사람을 빼낸 후 맨 뒤로 보낸다.
        $queue->push($queue->pop());
    }
    // 3.2. 사람을 제거한 후 제거된 사람을 출력한다.
    $result .= ($queue->pop()+1).", ";
}
echo $result.($queue->pop()+1).">";

$end = get_time();
$time = $end - $start;
echo "\n".$time.'초 걸림';

function get_time() {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
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
        $this->arr[$this->indexOfFront-1] = NULL;
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