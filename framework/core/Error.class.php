<?php

namespace framework\core;
class Error
{
    public static function errorHandler($err_no, $err_mes, $file, $line)
    {
        $err_mes = "<p>错误文件:" . $file . "</p><p>行数:" . $line . "</p><p>错误提示:" . $err_mes . "</p>";
        throw new ErrorException($err_mes, $err_no);
    }
}

?>