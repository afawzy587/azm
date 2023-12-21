<?php
namespace App\Helpers;
use DateTime;
class Helper{
    public static function sanitize( $str , $type = "str" )
    {
        $str = strip_tags ($str);
        $str = trim ($str);
        $str = htmlspecialchars ($str, ENT_NOQUOTES);
        $str = addslashes ($str);
        if($type == "area")
            $str = str_replace("\n","<br />",$str);
        return $str;
    }
    public static function dateFormat($date) {

       $format =  date('Y-m-d H:i:s',strtotime($date));

        return $format;
    }
    public static function timeDifference($date) {
        $createdTimestamp = strtotime($date); // Replace this with your actual creation timestamp
        $currentTimestamp = time();
        $timeDifference = $currentTimestamp - $createdTimestamp;
        $days = floor($timeDifference / (60 * 60 * 24));
        $hours = floor(($timeDifference % (60 * 60 * 24)) / (60 * 60));
        $minutes = floor(($timeDifference % (60 * 60)) / 60);

        $format = "";

        if ($days > 0) {
            $format .= $days . " day" . ($days > 1 ? "s" : "") . " ";
        } elseif ($hours > 0) {
            $format .= $hours . " hour" . ($hours > 1 ? "s" : "") . " ";
        } elseif ($minutes > 0) {
            $format .= $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ";
        } else {
            $format .= "less than a minute ";
        }

        return $format . "ago";
    }
    public static function truncateContent($content, $limit = 1000, $postfix = '...') {
        // Remove HTML tags and trim whitespace
        $content = trim(strip_tags($content));

        // Check if content exceeds the limit
        if (strlen($content) > $limit) {
            // Truncate to the specified limit and append postfix
            $content = substr($content, 0, $limit) . $postfix;
        }

        echo $content;
    }
    public static function getRoute() {
        return str_replace(self::getBaseUrl(),'',self::getCurrentURL());
    }
    public static function getCurrentURL() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];

        return $protocol . "://" . $host . $path;
    }
    public static function getBaseUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $script = $_SERVER['SCRIPT_NAME'];

        $baseUrl = $protocol . '://' . $host . dirname($script);

        return rtrim($baseUrl, '/');
    }
    public static function showPaginate($path,$page,$total,$pageSize)
    {
        $totalPages = ceil($total /$pageSize);
        if($totalPages > 0 ){
            echo '<nav aria-label="Page navigation example ">
                        <ul class="pagination">';
                        if($page > 1){
                            echo '<li class="page-item">
                                        <a class="page-link" href="'.\App\Helpers\Helper::getBaseUrl().$path.'?page='.($page-1).'" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>';
                           }
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo '<li class="page-item ';  if($i == $page) {echo 'active';} echo'"><a class="page-link " href="'.\App\Helpers\Helper::getBaseUrl().$path.'?page='.$i.'">'.$i.'</a></li>';
                            }
                            if($page != $totalPages) {
                                 echo '<li class="page-item">
                                                <a class="page-link" href="' . \App\Helpers\Helper::getBaseUrl() . $path . '?page=' . ($page + 1) . '" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>';
                             }
                    echo '</ul>
                    </nav>';
        }
    }
}

?>