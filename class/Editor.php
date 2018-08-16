<?php
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
        for($i=0; $i<$stackLeft->size(); $i++){
            $stackRight->push($stackLeft->pop());
        }
        for($i=0; $i<$stackRight->size(); $i++){
            echo $stackRight->pop();
        }
    }
}
?>