<snippet>
  <content>
# 3D CAPTCHA
## Demo
Web Unity will be needed to run the demo.
Chorome does not support unity now. Other browsers work fine with this demo.<br />
<a href="http://www.duoduoyu.org/3d_captcha/3d_captcha.html" target="_blank">http://www.duoduoyu.org/3d_captcha/3d_captcha.html</a>
## Introduction
This is a brand new idea of CAPTCHA to improve cyber security.
CAPTCHAs are added to surfaces of 3D models. And the 3D models can be rotated.
So each time when the a user wants to recogonize the CAPTCHA, the first thing she/he needs to do is to rotate and find the CAPTCHA.
## Security
This implementation is much safer than 2D CAPTCHAs because it's hard for robots to find the CAPTCHA at random locations on surfaces of 3D models.
Further more, the 3D models can have some animations such as slow rotation and slight transformation. This will also make it difficult to recogonize for robots.
For people, it's not that hard because we can find the CAPTCHAs on a moving and transforming object with logic and reasoning.
However, it's really hard for robots to do the same thing.
And for the worst, even if robots eventually know where the CAPTCHA is, it's the same difficulty for them to recognize as for recognizing 2D CAPTCHAS.
So it's difficult for robots recognization in two ways: looking for CAPTCHAS and recognizing CAPTCHAS.
## Implementation
This work is implemented in two parts. 
The front-end web unity takes charge of sending CAPTCHA request to server, receiving CAPTCHA image from server and replacing 3D model texture with the received texture.
In the backend, .php files are responsible for generating CAPTCHA texture mapping images and checking correctness of user inputs.
## Workflow
1. When the user refresh the front-end CAPTCHA window, a random integer will be sent to server as the ID of a certain CAPTCHA.
2. The server receives the ID and retrieve a corresponding CAPTCHA. Then this CAPTCHA will be added on a noise image which is selected from a set of noise images.
3. The next step for server is to send this image back to front-end web unity plugin.
4. Last, web unity plugin receives the image and replace the texture of 3D models through texture mapping.


## Features
Because the CAPTCHAs themselves will not be sent directly from server to fron-end, so it's hard for hackers to intercept the CAPTCHA information.
The 3D object models, background noise of textures and CAPTCHAs are all random, all of these will increase the difficulty for robots to crack.
## Future Work
Add more 3D models.<br />
Add more complex animations to 3D models.<br />
Create more effective background noise.<br />
Build the project as WebGL version to make it easier to use.

></content>
  <tabTrigger></tabTrigger>
</snippet>

