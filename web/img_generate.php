<?php
session_start();
  //Set the Content Type
 $img_names = array('0', '1_Printer_D.jpg', '2_Vehicle_SUV.jpg', '3_tv.jpg', '4_chair.jpg', '5_piano_diff.jpg', '6_mugTexture.jpg');
 $img_name = $img_names[$_SESSION['model_shape_ddy']];
  header('Content-type: image/jpeg');

  // Create Image From Existing File
  $jpg_image = imagecreatefromjpeg($img_name);

  // Allocate A Color For The Text
  $white = imagecolorallocate($jpg_image, 255, 255, 255);

  // Set Path to Font File
  $font_path = 'font.ttf';

  // Set Text to Be Printed On Image
  $text = "This is a sunset!";

  // Print Text On Image
  imagettftext($jpg_image, 200, 0, 75, 300, $white, $font_path, $text);

  // Send Image to Browser
  imagejpeg($jpg_image, 'test10_img.jpg');
  echo 'test.jpg';

  // Clear Memory
  imagedestroy($jpg_image);
?>