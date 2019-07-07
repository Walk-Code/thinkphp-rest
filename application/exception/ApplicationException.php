<?php


namespace app\exception;


use Throwable;

/**
 * @ClassName ApplicationException
 * @Description 应用异常类
 * @Author walk-code
 * @Date 2019/7/3 23:14
 * @Since php 7.2
 **/
class ApplicationException extends \RuntimeException {
    protected $code;
    protected $message;

    function __construct() {
    }

    function outputCustomMessagException($message) {
        parent::__construct($message);
        $this->message = $message;
    }

    function outputCustomDataException($code, $message) {
        parent::__construct($message,$code);
        $this->code    = $code;
        $this->message = $message;
    }

    function outputCustomMessageThrowable($message, Throwable $cause) {
        parent::__construct($message, $cause);
        $this->message = $message;
    }

    function outputThrowable(Throwable $cause) {
        parent::__construct($cause);
    }
}