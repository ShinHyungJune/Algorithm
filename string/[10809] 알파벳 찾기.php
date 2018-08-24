<?php
/*
    # 문제
    알파벳 소문자로만 이루어진 단어 S가 주어진다. 각각의 알파벳에 대해서, 단어에 포함되어 있는
    경우에는 처음 등장하는 위치를, 포함되어 있지 않은 경우에는 -1을 출력하는 프로그램을 작성하시오.

    # 핵심
    문자의 아스키코드를 배열의 인덱스로 사용.
*/

// 1. 문자열을 입력받는다.
$input = fscanf(STDIN,"%s\n");
list($string) = $input;

$length = strlen($string);
$arr = array_fill(ord('a'), ord('z'), -1);

// 2. 문자열의 수만큼 반복한다,
for($i=0; $i<$length; $i++){
    if($arr[ord($string[$i])] == -1)
        $arr[ord($string[$i])] = $i;
}

// 3. 결과를 출력한다.
for($i=ord('a'); $i<=ord('z'); $i++){
    echo $arr[$i]." ";
}
?>