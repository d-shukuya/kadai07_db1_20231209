<?php
//共通に使う関数を記述
//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($val)
{
    return htmlspecialchars($val, ENT_QUOTES);
}