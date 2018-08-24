<?php
/*
    # 문제
    ROT13은 카이사르 암호의 일종으로 영어 알파벳을 13글자씩 밀어서 만든다.
    예를 들어, "Baekjoon Online Judge"를 ROT13으로 암호화하면 "Onrxwbba Bayvar Whqtr"가 된다. ROT13으로 암호화한 내용을 원래 내용으로 바꾸려면 암호화한 문자열을 다시 ROT13하면 된다. 앞에서 암호화한 문자열 "Onrxwbba Bayvar Whqtr"에 다시 ROT13을 적용하면 "Baekjoon Online Judge"가 된다.
    ROT13은 알파벳 대문자와 소문자에만 적용할 수 있다. 알파벳이 아닌 글자는 원래 글자 그대로 남아 있어야 한다. 예를 들어, "One is 1"을 ROT13으로 암호화하면 "Bar vf 1"이 된다.
    문자열이 주어졌을 때, "ROT13"으로 암호화한 다음 출력하는 프로그램을 작성하시오.

    # 핵심
    아스키코드 이용, 13을 더한값이 제일 끝 문자의 아스키코드값을 넘어갔을 때는
    변환문자 = (처음 문자 아스키코드) + (문자아스키코드 + 13) - (제일 끝 문자 아스키코드) -1;
*/
    // 1. 문자열을 입력 받는다.
    $string = fgets(STDIN);
    $length = strlen($string) - 1;

    // 2. 문자열의 개수만큼 반복한다.
    for($i=0; $i<$length; $i++){
        // 2.1. 문자가 대문자나 소문자라면 13글자를 민다.
        if(ord('a') <= ord($string[$i]) && ord($string[$i]) <= ord('z')){
            $string[$i] = ROT13($string[$i], 'a', 'z');
        }

        if(ord('A') <= ord($string[$i]) && ord($string[$i]) <= ord('Z')){
            $string[$i] = ROT13($string[$i], 'A', 'Z');
        }

        echo $string[$i];
    }

    function ROT13($char, $charOfMin, $charOfMax){
        $index = ord($char) + 13;
        if($index > ord($charOfMax))
            return chr(ord($charOfMin) + $index - ord($charOfMax)-1);
        else
            return chr($index);
    }
?>