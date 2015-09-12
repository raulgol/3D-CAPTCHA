<?php
session_start();
// echo 'abc';
// echo $_POST['MODEL_SHAPE'];
$shape = $_POST['MODEL_SHAPE'];
$shape_names = array('', 'printer', 'vehicle', 'TV', 'chair', 'piano', 'mug', 'car', 'frog', 'gas station', 'dinasour');
// CAR2 1024 gas 1024 dinasour 2048 frog 2048
$_SESSION['model_shape_ddy'] = $shape_names[$shape];
//echo $_SESSION['model_shape_ddy'];
$capt_arr = array('3JkD', '87TY', 'P3LK', 'SFW1', 'BVG4', '573B', '4JWA', 'J984', 'BC1D', 'T3UP');

$_SESSION['captcha_ddy'] = $capt_arr[rand(0, count($capt_arr) - 1)];

$img_names_1024 = array('grid0_1024.jpg', 'grid3_1024.jpg', 'grid4_1024.jpg', 'grid5_1024.jpg');
$img_names_2048 = array('grid0_2048.jpg', 'grid3_2048.jpg', 'grid4_2048.jpg', 'grid5_2048.jpg');

$img_name = '';
if ($shape == 5 || $shape == 6 || $shape == 7 || $shape == 9 || $shape == 8) {
	 $img_name = $img_names_1024[rand(0, count($img_names_1024) - 1)];
}
else {
	 $img_name = $img_names_2048[rand(0, count($img_names_2048) - 1)];
}
  header('Content-type: image/jpeg');

  // Create Image From Existing File
  $jpg_image = imagecreatefromjpeg($img_name);

  if (strpos($img_name,'grid0') !== false) {
  	  $rgb = 95;
  	   if($shape == 5 || $shape == 6 ) {
  	  	$rgb = 150;
  	  }
  	  $color = imagecolorallocate($jpg_image, $rgb, $rgb, $rgb);
  }
  if (strpos($img_name,'grid5') !== false) {
  	  $rgb = 50;
  	   
  	  $color = imagecolorallocate($jpg_image, $rgb, $rgb, $rgb);
  }
if (strpos($img_name,'grid3') !== false) {
  	  $rgb = 105;

  	  if($shape == 5) {
  	  	$rgb = 155;
  	  }
  	  if($shape == 6) {
  	  	$rgb = 155;
  	  }
  	  if ($shape == 3) { //tv 
  	  	$rgb = 138;
  	  }
  	  $rgb = $rgb - 30;
  	  $color = imagecolorallocate($jpg_image, $rgb, $rgb, $rgb);
  }
  if (strpos($img_name,'grid4') !== false) {
  	  $rgb = 105;
  	  if($shape == 6) {
  	  	$rgb = 170;
  	  }
  	  if($shape == 5) {
  	  	$rgb = 170;
  	  }
  	  if ($shape == 1) { // printer 
  	  	$rgb = 130;
  	  }
  	  $rgb = $rgb - 30;
  	  $color = imagecolorallocate($jpg_image, $rgb, $rgb, $rgb);
  }
  if (strpos($img_name,'grid2') !== false) {
  	  $rgb =0;
  	  $color = imagecolorallocate($jpg_image, 50, 50, 50);
  }

  // Set Path to Font File
  $font_path = './font.ttf';

  // Set Text to Be Printed On Image
  $text = $_SESSION['captcha_ddy'];

  // Print Text On Image
//$shape = 6;
function writeTxt($size, $rotate, $x, $y, $color, $txt) {

			//imagettftext($jpg_image, $size, $rotate, $x, $y, $color, $font_path, 'abc');
	global $jpg_image, $font_path, $white, $shape;
	$result = str_split($txt);
	if ($shape == 5 || $shape == 6 ) {
			$size =30;
		}
		else if ($shape == 3) { //tv 
			$size = 85;
		}else if ($shape == 7) { //tv 
			$size = 50;
		}else if ($shape == 8) { //tv 
			$size = 40;
		}else if ($shape == 9) { //tv 
			$size = 45;
		}else if ($shape == 10) { //tv 
			$size = 55;
		}
		else {
			$size = 70;
		}
		imagettftext($jpg_image, $size, $rotate, $x, $y, $color, $font_path, $txt);
	}






  if ($shape == 6) { // mug
						//$randomPosNum = rand(0, 1);
						$randomPosNum = 0;//dummy
						if ($randomPosNum == 0) {
								$xPos = 400;
								$yPos = 409;
								//imagettftext($jpg_image, 25, 0, $xPos, $yPos, $white, $font_path, $text);
								//$color_mug = imagecolorallocate($jpg_image, 53, 149, 213);

								writeTxt(25, 0, $xPos, $yPos,  $color, $text);

						}
						// if ($randomPosNum == 1) {
						// 		$xPos = 631;
						// 		$yPos = 600;
						// 		//imagettftext($jpg_image, 25, 180, $xPos, $yPos, $white, $font_path, $text);
						// 		writeTxt(25, 0, $xPos, $yPos, $white, $text);

						// }

						
				} else if ($shape == 1) { // printer
						$randomPosNum = rand(0, 9);
						if ($randomPosNum == 0) {
								$xPos = 60;
								$yPos = 2038;
						}
			if ($randomPosNum == 1) {
				$xPos = 81;
				$yPos = 1940;
			}
			if ($randomPosNum == 2) {
				$xPos = 70;
				$yPos = 1730;
			}
			if ($randomPosNum == 3) {
				$xPos = 1108;
				$yPos = 1965;
			}
			if ($randomPosNum == 4) {
				$xPos = 1116;
				$yPos = 1814;
			}
			if ($randomPosNum == 5) {
				$xPos = 1118;
				$yPos = 1643;
			}
			if ($randomPosNum == 6) {
				$xPos = 657;
				$yPos = 1916;
			}
			if ($randomPosNum == 7) {
				$xPos = 657;
				$yPos = 1724;
			}
			if ($randomPosNum == 8) {
				$xPos = 802;
				$yPos = 963;
			}
			if ($randomPosNum == 9) {
				$xPos = 1117;
				$yPos = 874;
			}
			//imagettftext($jpg_image, 40, 0, $xPos, $yPos, $white, $font_path, $text);
			//$color_printer = imagecolorallocate($jpg_image, 150, 150, 150); // 100 100 100
			writeTxt(40, 0, $xPos, $yPos,  $color, $text);

			
				} else if ($shape == 2) { // suv
						$randomPosNum = rand(0, 7);
			//int randomPosNum = 7;
						if ($randomPosNum == 0) {
							$xPos = 987;
							$yPos = 956;
						}
						if ($randomPosNum == 1) {
							$xPos = 1286;
							$yPos = 899;
						}
						if ($randomPosNum == 2) {
							$xPos = 1407;
							$yPos = 772;
						}
						if ($randomPosNum == 3) {
							$xPos = 933;
							$yPos = 720;
						}
						if ($randomPosNum == 4) {
							$xPos = 38;
							$yPos = 976;
						}
						if ($randomPosNum == 5) {
							$xPos = 102;
							$yPos = 766;
						}
						if ($randomPosNum == 6) {
							$xPos = 662;
							$yPos = 1503;
						}
						if ($randomPosNum == 7) {
							$xPos = 1258;
							$yPos = 1458;
						}
						//imagettftext($jpg_image, 50, 0, $xPos, $yPos, $white, $font_path, $text);
						//$color_suv = imagecolorallocate($jpg_image, 89, 103, 158);
						writeTxt(50, 0, $xPos, $yPos,  $color, $text);


		} else if ($shape == 3) { //tv 
			  $color_tv = imagecolorallocate($jpg_image, 60, 70, 70);

			$randomPosNum = rand(0, 5);
			if ($randomPosNum == 0) {
				$xPos = 393;
				$yPos = 1835;
						    //imagettftext($jpg_image, 50, 90, $xPos, $yPos, $white, $font_path, $text);
							writeTxt(50, 0, $xPos, $yPos,  $color, $text);


			}
			if ($randomPosNum == 1) {
				$xPos = 1280;
				$yPos = 1600;
						    //imagettftext($jpg_image, 50, -90, $xPos, $yPos, $white, $font_path, $text);
						    								writeTxt(50, 0, $xPos, $yPos,  $color, $text);


			}
			if ($randomPosNum == 2) {
				$xPos = 1290;
				$yPos = 1688;
							//imagettftext($jpg_image, 50, 0, $xPos, $yPos, $white, $font_path, $text);
												writeTxt(50, 0, $xPos, $yPos,  $color, $text);


			}
			if ($randomPosNum == 3) {
				$xPos = 1190;
				$yPos = 1188;
											//imagettftext($jpg_image, 50, -90, $xPos, $yPos, $white, $font_path, $text);
											writeTxt(50, 0, $xPos, $yPos,  $color, $text);


			}
			if ($randomPosNum == 4) {
				$xPos = 1290;
				$yPos = 888;
											//imagettftext($jpg_image, 50, 0, $xPos, $yPos, $white, $font_path, $text);
									writeTxt(50, 0, $xPos, $yPos,  $color, $text);


			}
			if ($randomPosNum == 5) {
				$xPos = 1360;
				$yPos = 788;
															//imagettftext($jpg_image, 50, -90, $xPos, $yPos, $white, $font_path, $text);
								writeTxt(50, 0, $xPos, $yPos,  $color, $text);

			}

		} else if ($shape == 4) { // chair
			$randomPosNum = rand(0, 8);
			 //randomPosNum = 8; // 
			if ($randomPosNum == 0) {
				$xPos = 263;
				$yPos = 1822;
			}
			if ($randomPosNum == 1) {
				$xPos = 439;
				$yPos = 1568;
			}
			if ($randomPosNum == 2) {
				$xPos = 235;
				$yPos = 818;
			}
			if ($randomPosNum == 3) {
				$xPos = 430;
				$yPos = 535;
			}
			if ($randomPosNum == 4) {
				$xPos = 1206;
				$yPos = 582;
			}
			if ($randomPosNum == 5) {
				$xPos = 1258;
				$yPos = 438;
			}
			if ($randomPosNum == 6) {
				$xPos = 441;
				$yPos = 865;
			}
			if ($randomPosNum == 7) {
				$xPos = 710;
				$yPos = 1944;
			}
			if ($randomPosNum == 8) {
				$xPos = 1071;
				$yPos = 663;
			}
			//imagettftext($jpg_image, 50, 0, $xPos, $yPos, $white, $font_path, $text);
			//$color_chair = imagecolorallocate($jpg_image, 142, 132, 126);
				writeTxt(50, 0, $xPos, $yPos,  $color, $text);


		} else if ($shape == 5) { // piano
			$randomPosNum = rand(0, 3);
			//randomPosNum = 3; // 
			if ($randomPosNum == 0) {
				$xPos = 63;
				$yPos = 950;
			}
			if ($randomPosNum == 1) {
				$xPos = 363;
				$yPos = 950;
			}
			if ($randomPosNum == 2) {
				$xPos = 463;
				$yPos = 950;
			}
			if ($randomPosNum == 3) {
				$xPos = 263;
				$yPos = 950;
			}
			  //$color_piano = imagecolorallocate($jpg_image, 127, 70, 37);

			//imagettftext($jpg_image, 20, 0, $xPos, $yPos, $white, $font_path, $text);
			  writeTxt(20, 0, $xPos, $yPos, $color, $text);


		} else if ($shape == 7) { // car
			$randomPosNum = rand(0, 1);
			//randomPosNum = 3; // 
			if ($randomPosNum == 0) {
				$xPos = 449;
				$yPos = 490;
			}
			if ($randomPosNum == 1) {
				$xPos = 566;
				$yPos = 133;
			}
			//imagettftext($jpg_image, 20, 0, $xPos, $yPos, $white, $font_path, $text);
			  writeTxt(40, 0, $xPos, $yPos, $color, $text);


		} else if ($shape == 8) { // frog
			$randomPosNum = rand(0, 1);
			if ($randomPosNum == 0) {
				$xPos = 209;
				$yPos = 795;
			}
			if ($randomPosNum == 1) {
				$xPos = 803;
				$yPos = 799;
			}
			//imagettftext($jpg_image, 20, 0, $xPos, $yPos, $white, $font_path, $text);
			  writeTxt(14, 0, $xPos, $yPos, $color, $text);


		} else if ($shape == 9) { // gas
			$randomPosNum = rand(0, 1);
			//randomPosNum = 3; // 
			if ($randomPosNum == 0) {
				$xPos = 303;
				$yPos = 182;
			}
			if ($randomPosNum == 1) {
				$xPos = 284;
				$yPos = 821;
			}
			//imagettftext($jpg_image, 20, 0, $xPos, $yPos, $white, $font_path, $text);
			  writeTxt(40, 0, $xPos, $yPos, $color, $text);


		} else if ($shape == 10) { // dinasour
			$randomPosNum = rand(0, 1);
			//randomPosNum = 3; // 
			if ($randomPosNum == 0) {
				$xPos = 1307;
				$yPos = 1204;
			}
			if ($randomPosNum == 1) {
				$xPos = 1307;
				$yPos = 1204;
			}
			//imagettftext($jpg_image, 20, 0, $xPos, $yPos, $white, $font_path, $text);
			  writeTxt(50, 0, $xPos, $yPos, $color, $text);


		} else {
		}





  // Send Image to Browser
  imagejpeg($jpg_image, 'texture.jpg');
  //echo $shape;

  // Clear Memory
  imagedestroy($jpg_image);
?>