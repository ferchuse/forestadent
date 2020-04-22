<?php
	/*
		//GET Authorization code (Grant Token)
		
		Expires in 1 minute, single use
		
		
		https://accounts.zoho.com/oauth/v2/auth
		?response_type=code&
		client_id=1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H&
		scope=ZohoCampaigns.contact.READ&
		redirect_uri=http://localhost/forestadent/clientes/api.php
		
		https://accounts.zoho.com/oauth/v2/auth?response_type=code&client_id=1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H&scope=ZohoCampaigns.contact.READ&redirect_uri=http://micrositio.mx/forestadent/clientes/api.php
		
		CODE: 	1000.e5b33a5781d937a5b8f652af010dcd41.0446bbfd31235d434811be365800d94f
		
		
		Token Request
		
		https://accounts.zoho.com/oauth/v2/token
		
		
		Parameters:
		
		client_id=1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H
		grant_type=authorization_code
		client_secret=1044612995dbbbe2c32c174c28601362436f3fe074&
		redirect_uri=http://localhost/forestadent/clientes/api.php&
		code=1000.e5b33a5781d937a5b8f652af010dcd41.0446bbfd31235d434811be365800d94f
		
		
		
		
		//client id : 1000.3DTDMRE85L71RG9VUNFKOMU6G3DIRH 
		//secret: b7b5092bdf1585158e63221464850022f01cc6b853
		//scope ZohoCampaigns.contact.READ
		
		//scope 1000.be355e2897449ee6d03733f963422f1c.f10e807abded9dc76eca73066b6fd777.
		
		//1000.38065c8faeb2cdfc66d1d7d397728773.c5d305c7c9ac3b9d9bcf1e97f8a76f34
		
		//Authorization Request
		/*
		STEp 1 Create client credentials
		
		https://api-console.zoho.com/add#js
		
		redirect http://localhost/forestadent/clientes/api.php
		
		TOKEN JS 1000.abbb56faba6ced698f7187c21e29f285.14311a42b2e65041557b56b65723a158
		
		list key alma delia 89fa7348c64f1b362ae4d02b29c202b1894375f7a7d2d66f
		STEP 2 Enter url
		
		https://accounts.zoho.com/oauth/v2/auth
		?response_type=code&
		client_id=1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H&
		scope=ZohoCampaigns.contact.READ&
		redirect_uri=http://localhost/forestadent/clientes/api.php
		
		Access Token Request
		
		{
		result: "success",
		locations: {
		eu: "https://accounts.zoho.eu",
		au: "https://accounts.zoho.com.au",
		in: "https://accounts.zoho.in",
		us: "https://accounts.zoho.com",
		},
		}
		
		
		
		STEP 2  Access Token Request
		
		Go to https://reqbin.com/req/4rwevrqh
		
		URL:  https://accounts.zoho.com/oauth/v2/token
		Post JSON String 
		
		{
    "client_id": "1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H" ,
		"grant_type": "authorization_code" ,
		"client_secret": "1044612995dbbbe2c32c174c28601362436f3fe074" ,
		"code": "1000.cf5acd9508fc0dc47bd2193d29bf1e4f.ba3d769bb641c29468b32013a1e37fb0",
		"redirect_uri": "http://localhost/forestadent/clientes/api.php" 
		}
	*/
	
	
	
	echo "Access Granted, Autorization Grant Code: <br>";
	echo $_GET["code"];
	
	
	
	
	
	// MAke curl to get token https://accounts.zoho.com/oauth/v2/token
?>

<html>
	<form method="post" action="https://accounts.zoho.com/oauth/v2/token" >
		
		Client iD	<input name="client_id" value="1000.L5HG1LK8GSA2UP8B4WVPOOSD1YBX9H"><br>
		<input type="hidden" name="grant_type" value="authorization_code"><br>
		Client Secret: <input name="client_secret" value="1044612995dbbbe2c32c174c28601362436f3fe074"><br>
		
		Code: <input name="code" value="<?= $_GET["code"];?>"><br>
		<input type="hidden" name="redirect_uri" value="https://micrositio.mx/forestadent/clientes/api.php"><br>
		<button>
			Enviar
		</button>
	</form>
</html>