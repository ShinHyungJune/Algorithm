<!--
# 문제
괄호 문자열(Parenthesis String, PS)은 두 개의 괄호 기호인 ‘(’ 와 ‘)’ 만으로 구성되어 있는 문자열이다.
그 중에서 괄호의 모양이 바르게 구성된 문자열을 올바른 괄호 문자열(Valid PS, VPS)이라고 부른다. 한 쌍의 괄호 기호로 된 “( )” 문자열은 기본 VPS 이라고 부른다.
만일 x 가 VPS 라면 이것을 하나의 괄호에 넣은 새로운 문자열 “(x)”도 VPS 가 된다. 그리고 두 VPS x 와 y를 접합(concatenation)시킨 새로운 문자열 xy도 VPS 가 된다.
예를 들어 “(())()”와 “((()))” 는 VPS 이지만 “(()(”, “(())()))” , 그리고 “(()” 는 모두 VPS 가 아닌 문자열이다.

여러분은 입력으로 주어진 괄호 문자열이 VPS 인지 아닌지를 판단해서 그 결과를 YES 와 NO 로 나타내어야 한다.
-->

<?php

$stack = new Stack();

$result = "YES";

// 1. 테스트케이스 개수를 입력받는다.
$num = trim(fgets(STDIN));

// 2. 테스트케이스 개수만큼 반복한다.
for($i=0; $i<$num; $i++){

    // 2.1. 괄호열을 입력받는다.
    $string = trim(fgets(STDIN));

    // 2.2. 괄호개수만큼 반복한다.
    for($j = 0; $j < strlen($string); $j++){
        if($string[$j] == '('){
            $stack->push($string[$j]);
        }else{
            if($stack->pop() == -1) // pop 실패
                $result = "NO";
        }
    }

    if($stack->size() != 0) // 아직 여는 괄호가 남았다면
        $result = "NO";

    // 2.2. 결과를 출력한다.
    echo $result."\n";

    // 초기화
    $stack->clear();
    $result = "YES";
}

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

    function clear()
    {
        return $this->size = 0;
    }
}
?>