function InputCheckUrl(Form)
 {
	 if (Form.title.value == "") 
	 {
		 Form.title.focus();
		 return (false);
	 }
	 if (Form.url.value == "") 
	 {
		 Form.url.focus();
		 return (false);
	 }
 }
 
 function InputCheckTag(Form)
 {
	 if (Form.tag.value == "") 
	 {
		 Form.tag.focus();
		 return (false);
	 }
 }
 
 function showSearch(){
 	$("#search").slideToggle(0);
 }