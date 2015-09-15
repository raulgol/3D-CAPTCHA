using UnityEngine;
using System.Collections;

public class addText : MonoBehaviour {
	private static string url_prefix = "";
	private string deleteImage_url = url_prefix + "img_delete.php";
	private string image_url = url_prefix + "texture.jpg";

	// Use this for initialization
	void Start () {
		// as long as this 3D model is created, retrive its texture which already has CAPTCHA written on it
		StartCoroutine(retrieveImage());
	}

	// retrieve texture from server
	IEnumerator retrieveImage() {
		WWW postRequest = new WWW(image_url);
		yield return postRequest;
		this.GetComponent<Renderer>().material.mainTexture = postRequest.texture;
		StartCoroutine(deleteImage());
	}

	// after replacing the texture, delete it from server to prevent hackers from visiting it directly
	IEnumerator deleteImage() {
		WWW postRequest = new WWW(deleteImage_url);
		yield return postRequest;
	}

	// Update is called once per frame
	void Update () {}
}
