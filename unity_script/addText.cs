using UnityEngine;
using System.Collections;

public class addText : MonoBehaviour {
	private static string url_prefix = "";
	private string deleteImage_url = url_prefix + "img_delete.php";
	private string image_url = url_prefix + "texture.jpg";

	// Use this for initialization
	void Start () {
		StartCoroutine(retrieveImage());
	}

	IEnumerator retrieveImage() {
		WWW postRequest = new WWW(image_url);
		yield return postRequest;
		this.GetComponent<Renderer>().material.mainTexture = postRequest.texture;
		StartCoroutine(deleteImage());
	}

	IEnumerator deleteImage() {
		WWW postRequest = new WWW(deleteImage_url);
		yield return postRequest;
	}

	// Update is called once per frame
	void Update () {}
}
