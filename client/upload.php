<?php
include("header.php");
echo"
	<center>
	<div id = \"view\">
		<div id = \"profile\">
			<div id = \"student\">
			<div id = \"info\">
			<h2>Airtel Zambia</h2><br/>
			<h3>Students: 10 / 20 </h3>
			<h3>Address: Building 43 Great East Road, Zambia.</h3>
			</div>
			<div id = \"stdBio\"><h2>Upload</h2>
			<form id = \"upload\" method = \"POST\"	action = \"upload.php\">
			<select id = \"exInput\" name=\"type\">
                <option value=\"job\">Job Opening</option>
                <option value=\"internship\">Internship</option>
            </select><br/><br/>
           <input id = \"exInput\" type = \"text\" name = \"upName\" placeholder = \"Title of Job/Intership Opening\"/><br/><br/>
           <input id = \"exInput\" type = \"text\" name = \"deadline\" placeholder = \"Deadline of Applications(dd/mm/yy)\" /><br/><br/>
           <textarea id = \"exInput\" name=\"descript\" rows=\"20\" cols=\"40\"  placeholder = \"Details of the Job/Internship Opening\" ></textarea><br/>
           <input id = \"submit\" type = \"submit\" id = \"submit\" name = \"submit\" value= \"Upload\"/>
		</form>
           </div>
			</div><br/>
		</div>

	</div></center>
";
include("footer.php");
?>