<?php

namespace Application\Controllers;

use System\Traits\HasSetFlashMessage;
use System\Traits\HasView;
use System\Traits\HasRedirect;

abstract class Controller
{
    use HasView, HasRedirect, HasSetFlashMessage;
}
