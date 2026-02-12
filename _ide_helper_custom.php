<?php

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    /** @return static */
    public function layout($view);
    
    /** @return static */
    public function title($title);
}

namespace Illuminate\Contracts\View;

use Illuminate\Contracts\Support\Renderable;

interface View extends Renderable
{
    /** @return static */
    public function layout($view);
    
    /** @return static */
    public function title($title);
}