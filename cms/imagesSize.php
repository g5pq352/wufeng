<?php

$uploadFileSize = "每次上傳之檔案大小總計請勿超過" . ini_get("upload_max_filesize") . "。";
$maxFileSize = "<br />$uploadFileSize";

$imagesSize = [
    "imagesSize" => [
        'IW' => 0,
        'IH' => 0,
        'note' => "圖片請上傳寬 710pixel之圖檔。 $maxFileSize",
    ],
    "news" => [
        'IW' => 694,
        'IH' => 380,
        'note' => "圖片請上傳寬 694pixel、高 380pixel之圖檔。 $maxFileSize",
    ],
    "newsCover" => [
        'IW' => 768,
        'IH' => 768,
        'note' => "圖片請上傳寬 768pixel、高 768pixel之圖檔。 $maxFileSize",
    ],
    "sightsCCover" => [
        'IW' => 130,
        'IH' => 130,
        'note' => "圖片請上傳寬 130pixel、高 130pixel之圖檔。 $maxFileSize",
    ],
    "sights" => [
        'IW' => 1024,
        'IH' => 682,
        'note' => "圖片請上傳寬 1024pixel、高 682pixel之圖檔。 $maxFileSize",
    ],
    "sightsCover" => [
        'IW' => 768,
        'IH' => 768,
        'note' => "圖片請上傳寬 768pixel、高 768pixel之圖檔。 $maxFileSize",
    ],
    "mapCCover" => [
        'IW' => 58,
        'IH' => 58,
        'note' => "圖片請上傳寬 58pixel、高 58pixel之圖檔。 $maxFileSize",
    ],
    "mapCover" => [
        'IW' => 360,
        'IH' => 360,
        'note' => "圖片請上傳寬 360pixel、高 360pixel之圖檔。 $maxFileSize",
    ],
    "tourCCover" => [
        'IW' => 606,
        'IH' => 584,
        'note' => "圖片請上傳寬 606pixel、高 584pixel之圖檔。 $maxFileSize",
    ],
    "tourCover" => [
        'IW' => 420,
        'IH' => 406,
        'note' => "圖片請上傳寬 420pixel、高 406pixel之圖檔。 $maxFileSize",
    ],
    "latestCCover" => [
        'IW' => 750,
        'IH' => 450,
        'note' => "圖片請上傳寬 750pixel、高 450pixel之圖檔。 $maxFileSize",
    ],
    "latestCover" => [
        'IW' => 768,
        'IH' => 768,
        'note' => "圖片請上傳寬 768pixel、高 768pixel之圖檔。 $maxFileSize",
    ],
    "latest" => [
        'IW' => 340,
        'IH' => 340,
        'note' => "圖片請上傳寬 340pixel、高 340pixel之圖檔。 $maxFileSize",
    ],
    "features" => [
        'IW' => 1700,
        'IH' => 860,
        'note' => "圖片請上傳寬 1700pixel、高 860pixel之圖檔。 $maxFileSize",
    ],
    "galleryCover" => [
        'IW' => 1312,
        'IH' => 980,
        'note' => "圖片請上傳寬 1312pixel、高 980pixel之圖檔。 $maxFileSize",
    ],
    "storeCover" => [
        'IW' => 200,
        'IH' => 200,
        'note' => "圖片請上傳寬不超過 200pixel、高不超過 200pixel之圖檔。 $maxFileSize",
    ],
    "neighborhoodsliderCover" => [
        'IW' => 886,
        'IH' => 1132,
        'note' => "圖片請上傳寬 886pixel、高 1132pixel之圖檔。 $maxFileSize",
    ],
    "indexsliderCover" => [
        'IW' => 1920,
        'IH' => 980,
        'note' => "圖片請上傳寬 1920pixel、高 980pixel之圖檔。 $maxFileSize",
    ],
    "indexprojectsCover" => [
        'IW' => 1920,
        'IH' => 1055,
        'note' => "圖片請上傳寬 1920pixel、高 1055pixel之圖檔。 $maxFileSize",
    ],
    "projectCover" => [
        'IW' => 1920,
        'IH' => 1042,
        'note' => "圖片請上傳寬不超過 1920pixel、高不超過 1042pixel之圖檔。 $maxFileSize",
    ],
    "project" => [
        'IW' => 1644,
        'IH' => 860,
        'note' => "圖片請上傳寬不超過 1644pixel、高不超過 860pixel之圖檔。 $maxFileSize",
    ],
    "lifeCover" => [
        'IW' => 800,
        'IH' => 726,
        'note' => "圖片請上傳寬不超過 800pixel、高不超過 726pixel之圖檔。 $maxFileSize",
    ],
    "lifeSide" => [
        'IW' => 1196,
        'IH' => 686,
        'note' => "圖片請上傳寬不超過 1196pixel、高不超過 686pixel之圖檔。 $maxFileSize",
    ],
    "life" => [
        'IW' => 554,
        'IH' => 370,
        'note' => "圖片請上傳寬不超過 554pixel、高不超過 370pixel之圖檔。 $maxFileSize",
    ],
    "progressCCover" => [
        'IW' => 544,
        'IH' => 816,
        'note' => "圖片請上傳寬不超過 544pixel、高不超過 816pixel之圖檔。 $maxFileSize",
    ],
    "progress" => [
        'IW' => 1920,
        'IH' => 1024,
        'note' => "圖片請上傳寬不超過 1920pixel、高不超過 1024pixel之圖檔。 $maxFileSize",
    ],
];
?>