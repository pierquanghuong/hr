<?php

namespace Modules\Admin\Widgets;

use CodeIgniter\View\Cells\Cell;

/**
 * AdminPresentStatisticCell
 */
class BaseWidget extends Cell
{
    protected string $html;
    
    /**
     * html khoi tao html cho widget
     *
     * @param  mixed $html_string
     * @return void
     */
    protected function html(string $html_string = '<h2>Chưa gán html</h2>')
    {
        $this->html = $html_string;
    }
        
    /**
     * render render khoi widget
     *
     * @return string
     */
    public function render() : string
    {
        return $this->html;
    }
}