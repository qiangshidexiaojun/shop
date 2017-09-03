<?php

vcode(91, 40, 4, 20, 4, 5);

//验证码函数
function vcode($w, $h, $fn, $fs, $iternum, $linenum)
{
    session_start();

    $im = imagecreatetruecolor($w, $h);

    $black = imagecolorallocate($im, 0, 0, 0);
    $gray = imagecolorallocate($im, 200, 200, 200);
    $green = imagecolorallocate($im, 0, 255, 0);

    imagefill($im, 0, 0, $gray);

    for ($i = 0; $i < $iternum; $i++) {
        imagesetpixel($im, mt_rand(0, $w), mt_rand(0, $h), $black);
    }

    for ($i = 0; $i < $linenum; $i++) {
        imageline($im, (mt_rand(0, $w)), (mt_rand(0, $h)), (mt_rand(0, $w)), (mt_rand(0, $h)), $black);
    }

    $x = ($w - $fs * $fn) / 2 + 10;
    $y = ($h - $fs) / 2 + $fs;

    $strarr = array_merge(range(0, 9), range(a, z), range(A, Z));
    shuffle($strarr);
    $str = join("", array_slice($strarr, 0, $fn));
    $_SESSION['vstr'] = $str;

    $file = "../../home/fonts/simsun.ttc";

    imagettftext($im, $fs, 0, $x, $y, $black, $file, $str);

    header("content-type:image/png");
    imagepng($im);

    imagedestroy($im);
}
