<?php
// this script is used to delete the generated 3D model texture
// it's called by web unity file
// after the web unity has repalced texture of 3D model, this script will be called
// if the texture does not be deleted, hackers can visit the texture directly with URL, it's not safe
if (!unlink("texture.jpg")) {
  echo ("Error deleting ");
} else {
  echo ("Deleted ");
}
?>