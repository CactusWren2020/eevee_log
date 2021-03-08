<?php 

$pretty = function ($v = [], $c = "&nbsp;&nbsp;&nbsp;&nbsp;", $in = -1, $k = null) use (&$pretty) {
    $r = '';
    if (in_array(gettype($v), array('object', 'array'))) {
        $r .= ($in != -1 ? str_repeat($c, $in) : '') . (is_null($k) ? '' : "$k: ") . '<br>';
        foreach ($v as $sk => $vl) {
            $r .= $pretty($vl, $c, $in + 1, $sk) . '<br>';
        }
    } else {
        $r .= ($in != -1 ? str_repeat($c, $in) : '') . (is_null($k) ? '' : "$k: ") . (is_null($v) ? '&lt;NULL&gt;' : "<strong>$v</strong>");
    }
    return $r;
};

?>