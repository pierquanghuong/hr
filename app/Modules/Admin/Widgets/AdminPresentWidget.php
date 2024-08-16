<?php

namespace Modules\Admin\Widgets;

use Modules\Admin\Widgets\BaseWidget;

/**
 * AdminPresentStatisticCell use:  <?= view_cell('Modules\Admin\Widgets\AdminPresentWidget::render') ?>
 */
class AdminPresentWidget extends BaseWidget
{   
   protected function setup_html()
   {
        $count_present = 100;
        $count_phongban = 4;
        $html = '
            <div class = "present-widget">
                <h2> Thống kê tặng quà </h2>
                <p>Có' . $count_present . 'lượt tặng quà</p>
                <p>Có' . $count_phongban . 'Phòng ban</p>
            </div>
        ';
        $this->html($html);
   }

   public function render(): string
   {
        $this->setup_html();
        return $this->html;
   }
}