<?php

namespace Rozetka\common;

class Constants
{

    const ERROR_URL_IS_EMPTY = 'url_is_empty';

    const ERROR_RESPONSE_CODE = 'response_code';

    const ERRORS = [
        self::ERROR_URL_IS_EMPTY => 'Посилання не може бути пустим.',
        self::ERROR_RESPONSE_CODE => 'Помилковий код відповіді.',
    ];

    const SUCCESS_STATUS_CODES = [200];

}