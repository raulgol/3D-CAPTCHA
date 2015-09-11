<?php
//unlink("test10_img.png");  
if (!unlink("test10_img.jpg"))
  {
  echo ("Error deleting ");
  }
else
  {
  echo ("Deleted ");
  }
?>