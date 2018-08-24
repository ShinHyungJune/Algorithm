<?php
/*
    # 문제
    알파벳 소문자로만 이루어진 단어 S가 주어진다. 각 알파벳이 단어에 몇 개가 포함되어 있는지 구하는 프로그램을 작성하시오.

    # 핵심
    문자의 아스키코드를 배열의 인덱스로 사용.
*/
    // 1. 문자열을 입력받는다.
    $input = fscanf(STDIN,"%s\n");
    list($string) = $input;

    $length = strlen($string);
    $arr = array_fill(ord('a'), ord('z'), 0);

    // 2. 문자열의 수만큼 반복한다,
    for($i=0; $i<$length; $i++){
        $arr[ord($string[$i])]++;
    }

    // 3. 결과를 출력한다.
    for($i=ord('a'); $i<=ord('z'); $i++){
        echo $arr[$i]." ";
    }
?>