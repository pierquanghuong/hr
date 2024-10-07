<?php
    use CodeIgniter\I18n\Time;
use Config\HrGame;

    if (! function_exists('to_display_datetime')) {
        /**
         * convert time database sang time hiển thị d-m-Y H:i:s
         *
         * @param string $dbdatetime 
         * @return string display datetime
         */
        function to_display_datetime($dbdatetime, $format = 'Y-m-d G:i:s')
        {
            $result = Time::createFromFormat($format, $dbdatetime);
            return $result->format('d-m-Y G:i:s');
        }
    }

    if (! function_exists('to_dbdatetime')) {
        /**
         * convert time display d-m-y sang time hiển thị Y-m-d H:i:s - su dung de luu db
         *
         * @param string $dbdatetime 
         * @return string db datetime
         */
        function to_dbdatetime($display_time, $format = 'd-m-Y G:i:s')
        {
            $result = Time::createFromFormat($format, $display_time);
            return $result->format('Y-m-d G:i:s');
        }
    }

    if (! function_exists('display_present_status')) {
        function display_status(int $status = 1) : string {
            $status_list = setting('HrGame.present_status');
            $message = '<span class="label label-danger">' . $status_list[$status] . '</span>';
            return $message;
        }
    }
?>