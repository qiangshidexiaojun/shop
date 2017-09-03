<?php


//图片缩放函数
function thumb($maxfile, $minw, $minh)
{
    //大文件文件名
    $filename = $maxfile;
//    创建一个新的图像
    $max = imagecreatefromjpeg($filename);
//获得大图的大小
    $imgarr = getimagesize($filename);
//   大图的宽
    $maxw = $imgarr[0];
//    大图的高
    $maxh = $imgarr[1];
//    大图的类型
    $maxt = $imgarr[2];
    $maxm = $imgarr['mime'];

//    进行缩放前比例计算
    if (($minw / $maxw) > ($minh / $maxh)) {
        $proportion = $minh / $maxh;
    } else {
        $proportion = $minw / $maxw;
    }

    $minw = floor($maxw * $proportion);
    $minh = floor($maxh * $proportion);

//    新建小图的图像
    $min = imagecreatetruecolor($minw, $minh);
//拷贝大图的图像并进行缩放
    imagecopyresampled($min, $max, 0, 0, 0, 0, $minw, $minh, $maxw, $maxh);

    header("content-type:{$maxm}");

    switch ($maxt) {
        case 1:
            $imageout = "imagegif";
            break;

        case 2:
            $imageout = "imagejpeg";
            break;

        case 3:
            $imageout = "imagepng";
            break;
    }

//    获得大图的路劲
    $dir= dirname($maxfile);
//获得大图的文件名部分
    $file = basename($maxfile);
//    加工小图的命名
    $filesmallname = $dir.'/'.'s_' . $file;
    $imageout($min, $filesmallname);

    /*switch ($maxt){
        case 1:
            imagegif($min);
            break;

        case 2:
            imagejpeg($min);
            break;

        case 3:
            imagepng($min);
            break;
    }*/

    imagedestroy($max);
    imagedestroy($min);
}


