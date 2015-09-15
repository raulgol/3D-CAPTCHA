using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class Handler : MonoBehaviour {
	public GameObject handlerCamera;
	public string text = "";
	public int numOfCaptcha;
	public int xPos, yPos;
	public int numOfModelType;
	private GameObject modelRef;

	// 3D models
	public GameObject prefabSmug;
	public GameObject prefabPrinter;
	public GameObject prefabSUV;
	public GameObject prefabChair;
	public GameObject prefabWood;
	public GameObject prefabPiano;
	public GameObject prefabSolider;
	public GameObject prefabJet;
	public GameObject prefabFrog;
	public GameObject prefabGas;
	public GameObject prefabCar;
	public GameObject mainCamera;

	public Texture btnTexture;
	private static string url_prefix = "";
	private string startcode_url = url_prefix + "setStartTime.php";  // record start time 
	private string setModelType_url = url_prefix + "setModelShape.php";  // let the server know which model being displayed right now and return corresponding texture
	private CameraScript cameraSrc;
	
	public void Start() {
		cameraSrc = (CameraScript)handlerCamera.GetComponent<CameraScript> ();
		numOfModelType = Random.Range(1, 11);  // generate random 3D model
		StartCoroutine(setModelType(numOfModelType));
		StartCoroutine(setStartTime());
	}
	
	public void OnGUI() {
		// refresh button
		if (GUI.Button (new Rect (10, 10, 100, 50), "Regenerate")) {
			if (modelRef == null) return;
			Destroy(modelRef,0f);
			numOfModelType = Random.Range (1, 11);
			StartCoroutine(setModelType(numOfModelType));
			
		}
	}

	// set the start time of trials
	IEnumerator setStartTime() {
		WWW postRequest = new WWW( startcode_url);
		yield return postRequest;
	}
	
	// let the server know what the model being displayed right now
	IEnumerator setModelType(int val) {
		WWWForm form = new WWWForm();// = new WWWForm();
		form.AddBinaryData("binary", new byte[1]);
		form.AddField( "MODEL_SHAPE", val);
		// send the random model shape ID to server
		WWW postRequest = new WWW(setModelType_url, form);
		yield return postRequest;
		genRandomModel ();
	}

	public void initialize3DModel(GameObject prefab, Vector3 modelRotate, Vector3 cameraPos, Vector3 cameraRotate, float cameraX, float cameraY) {
			modelRef = Instantiate (prefab, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (modelRotate.x, modelRotate.y, modelRotate.z, Space.Self);
			mainCamera.transform.position = cameraPos;
			mainCamera.transform.Rotate(cameraRotate.x, cameraRotate.y, cameraRotate.z);
			cameraSrc.x = cameraX;
			cameraSrc.y = cameraY;
	}

	// generate a random 3D model and set the initial view to make the CAPTCHA unseen
	// this part is the FUTURE WORK: it will be automated with an algorithm
	public void genRandomModel() {
		if (numOfModelType == 6) {
			initialize3DModel(prefabSmug, new Vector3(270, -90, 0), new Vector3(0, 0, -6), new Vector3(0, 0, 0), 0.0f, 0.0f);
		} else if (numOfModelType == 1) {		
			initialize3DModel(prefabPrinter, new Vector3(0, 0, 0), new Vector3(0, 0, -6), new Vector3(0, 0, 0), 0.0f, 0.0f);
		} else if (numOfModelType == 2) {
			initialize3DModel(prefabSUV, new Vector3(0, 0, 0), new Vector3(0, 0, -6), new Vector3(0, 0, 0), 0.0f, 0.0f);
		} else if (numOfModelType == 3) {
			initialize3DModel(prefabChair, new Vector3(0, 0, 0), new Vector3(5.881571f, 1.185944f, 0.02566382f), new Vector3(11.4f, 269.75f, 4.354783e-07f), 269.75f, 11.4f);
		} else if (numOfModelType == 4) {
			initialize3DModel(prefabWood, new Vector3(0, 0, 0), new Vector3(19.8f, 270.25f, 0), new Vector3(5.645231f, 2.032428f, -0.02463197f), 270.25f, 19.8f);
		} else if (numOfModelType == 5) {
			initialize3DModel(prefabPiano, new Vector3(270, 180, 0), new Vector3(0, 0, 0), new Vector3(0, 0, -6), 0.0f, 0.0f);
		} else if (numOfModelType == 7) {  // car
			initialize3DModel(prefabJet, new Vector3(270, 180, 0), new Vector3(0, 0, 0), new Vector3(0, 0, -6), 0.0f, 0.0f);
		} else if (numOfModelType == 8) { // frog
			initialize3DModel(prefabFrog, new Vector3(270, 180, 0), new Vector3(0, 0, 0), new Vector3(0, 0, -6), 0.0f, 0.0f);
		} else if (numOfModelType == 9) { // gas station
			initialize3DModel(prefabGas, new Vector3(270, 180, 0), new Vector3(0, 0, 0), new Vector3(0, 0, -6), 0.0f, 0.0f);
		} else if (numOfModelType == 10) {  // dinosaur
			initialize3DModel(prefabCar, new Vector3(270, 180, 0), new Vector3(0, 0, 0), new Vector3(0, 0, -6), 0.0f, 0.0f);
		} else {}
	}
}