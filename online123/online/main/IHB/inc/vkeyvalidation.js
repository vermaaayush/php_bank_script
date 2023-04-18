var p;var cardFlag=true;function writePwd(s){if(num==1)
{if(document.logonForm.password.value.length<10){fld=document.logonForm.password.value+s;document.logonForm.password.value=fld;}}
else if(num==0)
{if(document.logonForm.userId.value.length<12){fld=document.logonForm.userId.value+s;document.logonForm.userId.value=fld;}}}
function clearAll()
{if(num==1)
{document.logonForm.password.value="";}else if(num==0)
{document.logonForm.userId.value="";}}
function backSpacer()
{if(num==1)
{oldPwd=document.logonForm.password.value;newPwd=oldPwd.substr(0,oldPwd.length-1);document.logonForm.password.value=newPwd;}
else if(num==0)
{oldlogin=document.logonForm.userId.value;newlogin=oldlogin.substr(0,oldlogin.length-1);document.logonForm.userId.value=newlogin;}}