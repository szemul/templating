<?php

namespace Szemul\Templating\Enum;

enum Type: string
{
    case HTML = 'html';
    case JSON = 'json';
    case JS   = 'js';
    case RAW  = 'raw';
}
