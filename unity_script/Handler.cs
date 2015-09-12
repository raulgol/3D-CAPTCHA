using UnityEngine;
using System.Collections;
using System.Collections.Generic;

public class Handler : MonoBehaviour
{
	public GameObject handlerCamera;
	public string text = "";
	public int numOfCaptcha;
	public int xPos, yPos;
	public int numOfModelType;
	private GameObject modelRef;
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
	private string startcode_url = url_prefix + "setStartTime.php";
	private string setModelType_url = url_prefix + "setModelShape.php";
	private CameraScript cameraSrc;
	
	public void Start()
	{
		cameraSrc = (CameraScript)handlerCamera.GetComponent<CameraScript> ();
		// numOfModelType = Random.Range (7, 11);
		numOfModelType = Random.Range(1, 11);
		StartCoroutine(setModelType(numOfModelType));
		StartCoroutine(setStartTime());
	}
	
	public void OnGUI() {
		if (GUI.Button (new Rect (10, 10, 100, 50), "Regenerate")) {
			if (modelRef == null) return;
			Destroy(modelRef,0f);
			numOfModelType = Random.Range (1, 11);
			StartCoroutine(setModelType(numOfModelType));
			
		}
		//		GUI.Label (new Rect (130, 10, 200, 40), testStr1);//testModelShapeNum
		//		GUI.Label (new Rect (340, 10, 200, 40), testModelShapeNum);//testModelShapeNum
		//		GUI.Label (new Rect (340, 10, 200, 40), t2);
		//		GUI.Label (new Rect (550, 10, 200, 40), t3);
	}

	IEnumerator setStartTime() {
		WWW postRequest = new WWW( startcode_url);
		yield return postRequest;
	}
	
	IEnumerator setModelType(int val) {
		WWWForm form = new WWWForm();// = new WWWForm();
		form.AddBinaryData("binary", new byte[1]);
		form.AddField( "MODEL_SHAPE", val);
		WWW postRequest = new WWW(setModelType_url, form);
		yield return postRequest;
		genRandomModel ();
	}

	public void genRandomModel() {
		if (numOfModelType == 6) {
			modelRef = Instantiate (prefabSmug, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;//as Transform;
			modelRef.gameObject.transform.Rotate (270, -90, 0, Space.Self);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			mainCamera.transform.Rotate(0, 0, 0);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
			
		} else if (numOfModelType == 1) {
			modelRef = Instantiate (prefabPrinter, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			mainCamera.transform.position = new Vector3(0, 0, -6);
			mainCamera.transform.Rotate(0, 0, 0);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 2) {
			
			modelRef = Instantiate (prefabSUV, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			//modelRef.gameObject.transform.Rotate (0, 90, 0, Space.Self);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			mainCamera.transform.Rotate(0, 0, 0);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 3) {
			
			modelRef = Instantiate (prefabChair, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			mainCamera.transform.position = new Vector3(5.881571f, 1.185944f, 0.02566382f);
			mainCamera.transform.Rotate(11.4f, 269.75f, 4.354783e-07f);
			cameraSrc.x = 269.75f;
			cameraSrc.y = 11.4f;
		} else if (numOfModelType == 4) {
			
			modelRef = Instantiate (prefabWood, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			mainCamera.transform.Rotate(19.8f, 270.25f, 0);
			mainCamera.transform.position = new Vector3(5.645231f, 2.032428f, -0.02463197f);
			cameraSrc.x = 270.25f;
			cameraSrc.y = 19.8f;
		} else if (numOfModelType == 5) {
			
			modelRef = Instantiate (prefabPiano, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (270, 180, 0, Space.Self);
			mainCamera.transform.Rotate(0, 0, 0);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 7) {  // car
			modelRef = Instantiate (prefabJet, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (270, 180, 0, Space.Self);
			mainCamera.transform.Rotate(0, 0, 0);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 8) { // frog
			modelRef = Instantiate (prefabFrog, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (270, 180, 0, Space.Self);
			mainCamera.transform.Rotate(0, 0, 0);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 9) { // gas station
			modelRef = Instantiate (prefabGas, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (270, 180, 0, Space.Self);
			mainCamera.transform.Rotate(0, 0, 0);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else if (numOfModelType == 10) {  // dinosaur
			modelRef = Instantiate (prefabCar, new Vector3 (0, 0, 0), Quaternion.identity) as GameObject;
			modelRef.gameObject.transform.Rotate (270, 180, 0, Space.Self);
			mainCamera.transform.Rotate(0, 0, 0);
			mainCamera.transform.position = new Vector3(0, 0, -6);
			cameraSrc.x = 0.0f;
			cameraSrc.y = 0.0f;
		} else {
		}
	}
}