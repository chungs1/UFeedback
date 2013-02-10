package com.example.feedback;

import java.util.ArrayList;
import java.util.List;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Context;
import android.os.AsyncTask;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.View.OnClickListener;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

public class SessionScreen extends Activity implements OnClickListener{
	private Spinner Drop_Down;
	private TextView Session_Information;
	private TextView Topic_Information;
	private Button Submit_Button;
	private Button Finish_Button;
	private EditText Comment;
	private ProgressDialog pDialog;
	
	private static final String TAG = "MyActivity";
	
	private String SessionID_string;
	private String Topic_string;


	@Override
	protected void onCreate(Bundle savedInstanceState) {
		// TODO Auto-generated method stub
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.session_screen);
		
		Drop_Down = (Spinner)findViewById(R.id.drop_down);
		String[] options = {"Comment", "Complaint", "Suggestion"};
		ArrayAdapter<String> myAdapter = new ArrayAdapter<String>(this, android.R.layout.simple_spinner_item, options);
		Drop_Down.setAdapter(myAdapter);
		
		Session_Information = (TextView)findViewById(R.id.session_id_information);
		Topic_Information = (TextView)findViewById(R.id.session_topic_information);
		
		Submit_Button = (Button)findViewById(R.id.submit);
		Submit_Button.setOnClickListener(this);
		Comment = (EditText)findViewById(R.id.comment);
		
		Finish_Button = (Button)findViewById(R.id.finish);
		Finish_Button.setOnClickListener(this);
		
		Bundle receivedMessages = getIntent().getExtras();
		SessionID_string = receivedMessages.getString("SessionID");
		Log.i(TAG, "SESIONID = " + SessionID_string);
		Topic_string = receivedMessages.getString("Topic");
		
		Session_Information.setText(Session_Information.getText().toString() + SessionID_string);
		Topic_Information.setText(Topic_Information.getText().toString() + Topic_string);
	}

	@Override
	public void onClick(View arg0) {
		// TODO Auto-generated method stub
		switch(arg0.getId()) {
		case R.id.submit:
			String comment = Comment.getText().toString();
			if (comment.equals("")) {
				Context context = SessionScreen.this;
				CharSequence text = "Please Type a Comment";
				int duration = Toast.LENGTH_LONG;

				Toast toast = Toast.makeText(context, text, duration);
				toast.show();
				return;
			}
			
			String type = (String)Drop_Down.getSelectedItem();
			new SubmitInformation().execute(SessionID_string, type, comment);
			break;
		case R.id.finish:
			finish();
			break;
		}
	}
	
	private class SubmitInformation extends AsyncTask<String, String, String> {
    	@Override
    	protected void onPreExecute() {
    		super.onPreExecute();
    		pDialog = new ProgressDialog(SessionScreen.this);
    		pDialog.setMessage("Submitting Comment. Please wait..");
    		pDialog.setIndeterminate(false);
    		pDialog.setCancelable(false);
    		pDialog.show();
    	}

		@Override
		protected String doInBackground(String... param) {
			HttpClient httpclient = new DefaultHttpClient();
			HttpPost httppost = new HttpPost("http://www.feedbackapp.hostoi.com/log_information.php");

			try {
			    // Add your data
			    List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>(2);
			    nameValuePairs.add(new BasicNameValuePair("SessionID", param[0]));
			    nameValuePairs.add(new BasicNameValuePair("Type", param[1]));
			    nameValuePairs.add(new BasicNameValuePair("Comment", param[2]));
			    httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

			    // Execute HTTP Post Request
			    HttpResponse response = httpclient.execute(httppost);
			    
			    //Grab Response Information
			    HttpEntity entity = response.getEntity();
			    String responseText = EntityUtils.toString(entity);
			    return responseText;
			    

			} catch (Exception e) {
			    return "Error!";
			}
		}
		
		protected void onPostExecute(String result) {
			Context context = SessionScreen.this;
			CharSequence text =  (String)Drop_Down.getSelectedItem() + " Logged Successfully!";
			int duration = Toast.LENGTH_LONG;
			Toast toast = Toast.makeText(context, text, duration);
			toast.show();
			Comment.setText("");
			
			pDialog.dismiss();
		}
    }

}