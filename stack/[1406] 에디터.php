<?php
phpinfo();
$editor = new Editor();

$stackLeft = new Stack();

$stackRight = new Stack();

// 1. 문자열을 입력받는다.
$input = fscanf(STDIN, "%s\n");
list($string) = $input;
fflush(STDIN);

// 2. 스택을 초기화한다.
$stackLeft->push($string);

// 3. 입력할 명령어의 개수를 입력받는다.
$input = fscanf(STDIN, "%d\n");
list($num) = $input;
fflush(STDIN);

// 4. 명령어의 개수만큼 반복한다.
for($i=0; $i<$num; $i++){
    // 4.1. 명령어를 입력받는다.
    $input = fscanf(STDIN, "%s %c\n");
    list($command, $value) = $input;
    fflush(STDIN);

    // 4.2. 명령어를 수행한다.
    switch($command){
        case 'L':
            $editor->left($stackLeft, $stackRight);
            break;
        case 'D':
            $editor->right($stackLeft, $stackRight);
            break;
        case 'B':
            $editor->remove($stackLeft);
            break;
        case 'P':
            $editor->add($stackLeft, $value);
            break;
    }

}

// 5. 결과를 출력한다.
$editor->print($stackLeft, $stackRight);

class Editor
{
    function left($stackLeft, $stackRight)
    {
        $stackRight->push($stackLeft->pop());
    }

    function right($stackLeft, $stackRight)
    {
        $stackLeft->push($stackRight->pop());
    }

    function remove($stackLeft)
    {
        $stackLeft->pop();
    }

    function add($stackLeft, $word)
    {
        $stackLeft->push($word);
    }

    function print($stackLeft, $stackRight)
    {
        $result = '';

        while(!$stackLeft->empty()){
            $stackRight->push($stackLeft->pop());
        }

        while(!$stackRight->empty()){
            $result .= $stackRight->pop();
        }
        echo $result;
    }
}

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