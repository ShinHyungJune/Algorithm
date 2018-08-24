<?php
/*
    # 문제
    문자열 N개가 주어진다. 이 때, 문자열에 포함되어 있는 소문자, 대문자, 숫자, 공백의 개수를 구하는 프로그램을 작성하시오.
    각 문자열은 알파벳 소문자, 대문자, 숫자, 공백으로만 이루어져 있다.

    # 핵심
    아스키코드를 이용하여 소문자, 대문자, 숫자, 공백을 파악한다.
*/
    // 1. 문자열을 입력받는다.
    $string = fgets(STDIN);

    // 2. EOF를 입력받지 않을동안 반복한다.
    while(!feof(STDIN)){

        // 2.1. 배열을 초기화한다.
        $arr = array_fill(0,4,0);

        $length = strlen($string);
        // 2.2. 문자열의 개수만큼 반복한다.
        for($i=0; $i<$length-1; $i++){
            // 2.2.1. 문자를 분석하여 소문자, 대문자, 숫자, 공백의 개수를 알아낸다.
            if(ord('a') <= ord($string[$i]) && ord($string[$i]) <= ord('z')) // 소문자
                $arr[0]++;
            
            if(ord('A') <= ord($string[$i]) && ord($string[$i]) <= ord('Z')) // 대문자
                $arr[1]++;

            if(ord('0') <= ord($string[$i]) && ord($string[$i]) <= ord('9')) // 숫자
                $arr[2]++;

            if($string[$i] == ' ') // 공백
                $arr[3]++;
        }

        // 3. 결과를 출력한다.
        echo $arr[0]." ".$arr[1]." ".$arr[2]." ".$arr[3]."\n";

        // 4. 문자열을 입력받는다.
        $string = fgets(STDIN); // fgets는 \n까지 읽음
    }

?>