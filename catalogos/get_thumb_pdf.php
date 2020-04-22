
<?php
// require __DIR__ . '/php-imagick/vendor/autoload.php';

// $image = new Imagick('logo.png');

// $image->cropImage(190, 300, 350, 565);
// $image->resizeImage(256, 350, Imagick::FILTER_CATROM, 0);

// header("Content-Type: image/png");
// echo $image->getImageBlob();

//https://stackoverflow.com/questions/291813/recommended-way-to-embed-pdf-in-html

//<embed src="https://drive.google.com/viewerng/
//viewer?embedded=true&url=http://example.com/the.pdf" width="500" height="375">
//


$img = new Imagick();
$img->setSize(200, 400);
$img->readImage("logo.png");

$img->scaleImage(400, 800);

$size = $img->getSize();
print_r($size);

echo $img->getImageWidth().$img->getImageHeight();

?>


<?php
// $im = new Imagick('CABLE5.pdf[0]');
// $im->setImageFormat('jpeg');
// header('Content-Type: image/jpeg');
  // echo $im->getImageBlob();
?>