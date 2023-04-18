window.history.forward();$(document).unbind('keydown').bind('keydown',function(event){var doPrevent=false;if(event.keyCode===8){var d=event.srcElement||event.target;if((d.tagName.toUpperCase()==='INPUT'&&d.type.toUpperCase()==='TEXT')||(d.tagName.toUpperCase()==='INPUT'&&d.type.toUpperCase()==='PASSWORD')||d.tagName.toUpperCase()==='TEXTAREA'){doPrevent=d.readOnly||d.disabled;}
else{doPrevent=true;}}
if(doPrevent){event.preventDefault();}});var message="Sorry, you can't right click.\nClick 'OK' to Proceed.";var dtCh="https://ebanking.ithmaarbank.com/";var minYear=1900;var maxYear=2100;function clickIE4()
{if(event.button==2)
{alert(message);return false;}}
function clickNS4(e)
{if(document.layers||document.getElementById&&!document.all)
{if(e.which==2||e.which==3)
{alert(message);return false;}}}
if(document.layers)
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS4;}
else if(document.all&&!document.getElementById)
{document.onmousedown=clickIE4;}
document.oncontextmenu=new Function("alert(message);return false")
var vWinCal=null;function closeWin()
{if(vWinCal!=null)
{if(!vWinCal.closed)
{vWinCal.self.close();}}}
function changeCase(obj)
{if(obj.type=="select-one")
obj=obj.options[obj.selectedIndex];obj.value=obj.value.toUpperCase();return obj.value;}
function isBlank(s,internalCall)
{var lenParam=arguments.length;if(s.type=="password")
{if(s.value=="")return true;}
else if(s.type=="textarea")
{if(s.value=="")return true;}
else if(s.type=="text")
{if(lenParam<=1)
{s.value=s.value.replace(/^\s+/g,'').replace(/\s+$/g,'');}
if(s.value=="")return true;var count=0;var count1=0;var stopind=0;for(var j=0;j<s.value.length;j++)
{if(s.value.charAt(j)==" ")
count++;else
{stopind=j;break;}}
if(count==s.value.length)
return true;}
else if((s.type=="select-one")||(s.type=="select-multiple"))
{var len=s.length;var ind=s.options.selectedIndex;if(len==0)return true;for(var i=0;i<len;i++)
{if((s.options[i].selected)&&(s.options[i].value==""))
return true;}
if(ind<0)
{return true;}
if(s.options[ind].value==""||s.options[ind].value==null)
{return true;}}
return false;}
function getSelectedListValue(selectList)
{var jsvalue=selectList.options[selectList.selectedIndex].value;if(typeof jsvalue=='undefined'||jsvalue==null||jsvalue=='')
jsvalue=selectList.options[selectList.selectedIndex].text;return jsvalue;}
function checkBlank(obj)
{var len=obj.length;var returnFlag=false;for(var i=0;i<len;i++)
{if(obj.options[i].value!="")
{returnFlag=true;break;}}
return(returnFlag);}
function fnCBSDisableSelectBox(field)
{if(document.all||document.getElementById)
field.disabled=true;else{field.onfocus=fnCBSSkip;}
return;}
function fnCBSEnableSelectBox(field)
{if(document.all||document.getElementById)
field.disabled=false;else{field.onfocus=field.focus();}
return;}
function fnCBSDisableTextField(field)
{if(document.all||document.getElementById)
field.disabled=true;else{field.onfocus=fnCBSSkip;}
return;}
function fnCBSEnableTextField(field)
{if(document.all||document.getElementById)
field.disabled=false;else{field.onfocus=field.focus();}
return;}
function fnCBSEnableCheckBox(checkBox)
{if(checkBox.disabled){checkBox.disabled=false;if(!document.all&&!document.getElementById)
checkBox.onclick=checkBox.oldOnClick;}
return;}
function fnCBSIsValidEmailAddress(string){var addressPattern=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;return addressPattern.test(string);}
function ValidateEmailAddress(emailField,name,description)
{if(isBlank(emailField,'Y')||fnCBSIsValidEmailAddress(emailField.value))return true;else
{alert("  Invalid Entry : Correct Format is xxx@xx.xxx ");return false;}}
function clearFormList(formField)
{for(var i=0;i<formField.options.length;i++){formField.options[i].text="";formField.options[i].value="";formField.options[i].selected=false;}
formField.options.length=0;}
function clearSelectedList(obj)
{for(var i=0;i<obj.length;i++){obj[i].text="";obj[i].value="";}
obj.length=0;}
function checkGreaterDate(date1,date2)
{var fromdt=date1.value
var todt=date2.value
if((fromdt=="")&&(todt==""))return true;if(((fromdt!="")&&(todt==""))||((fromdt=="")&&(todt!="")))
{return false;}
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if(diff>0)
{return false;}
return true;}
function getDescListData(descArray,codeArray,theObj,descObj,index)
{if(descObj.options.length==0)
{descObj.options[0]=new Option();}
for(var i=0;i<descArray.length;i++)
{var selectedid=getSelectedListValue(theObj);if(selectedid==codeArray[i])
{descObj.options[index].text=descArray[i];descObj.options[index].value=descArray[i];break;}
else
{descObj.options[index].text='';descObj.options[index].value='';}}
if(0==theObj.selectedIndex)
{descObj.value="";}}
function checkBlankSpace(s)
{while(s.substring(0,1)==' ')
{s=s.substring(1,s.length);}
while(s.substring(s.length-1,s.length)==' ')
{s=s.substring(0,s.length-1);}
return s;}
function checkSpecialChars(Field)
{var val=Field.value;var flag;for(i=0;i<val.length;i++)
{if(val.charAt(i)=='#'||val.charAt(i)=='~'||val.charAt(i)=='&'||val.charAt(i)=='^'||val.charAt(i)=='~'||val.charAt(i)==',')
return true;}}
function checkNumber(field)
{var num=field.value;var i=0;var j=0;for(i=0;i<num.length;i++)
{if(num.charAt(i)==' ')
j++;else
break;}
num=num.substring(j,num.length);var k=0
if(num.charAt(num.length-1)==' ')
{for(i=num.length-1;i>=0;i--)
{if(num.charAt(i)==' ')
k++;else
break}}
num=num.substring(0,num.length-k);var num=field.value;var to=num.indexOf('.',0);if(isNaN(field.value))
return true;for(i=0;i<=num.length;i++)
{if(num.charAt(i)=='-')
return true;}
if(num.indexOf('.')==-1)
{if(parseInt(num)==0)
return true;}
else
{var n1=num.substring(0,num.indexOf('.'));var n2=num.substring(num.indexOf('.')+1);if((parseInt(n1)==0)&&(parseInt(n2)==0))
return true;}}
function getDescData(descArray,codeArray,theObj,descObj)
{for(var i=0;i<descArray.length;i++)
{var selectedid=getSelectedListValue(theObj);var desObjValue=descArray[i];if(selectedid==codeArray[i])
{if(desObjValue.indexOf("-")>-1){descObj.value=descArray[i].substring(0,descArray[i].indexOf("-"));}else{descObj.value=descArray[i];}
break;}}
if(0==theObj.selectedIndex)
{descObj.value="";}}
function getSelectedListValue(selectList)
{var value=selectList.options[selectList.selectedIndex].value;if(typeof value=='undefined'||value==null||value=='')
value=selectList.options[selectList.selectedIndex].text;return value;}
function setLovValues(lovName,lovValue)
{var i;if(lovName!=null)
{for(i=0;i<lovName.options.length;i++)
{if(lovName.options[i].value==lovValue)
lovName.options[i].selected=true;}}}
function clearForm(formObj)
{for(i=0;i<formObj.elements.length;i++)
{if(formObj.elements[i].type=="textarea")
{formObj.elements[i].value="";}
else if(formObj.elements[i].type=="text")
{formObj.elements[i].value="";}
else if(formObj.elements[i].type=="select-one")
{formObj.elements[i].options[0].selected=true;}
else if(formObj.elements[i].type=="checkbox")
{formObj.elements[i].checked=false;}}}
function Optpopulate(obj,elname)
{var objField=document.getElementById(elname);if(obj.length!=0)
{for(var i=0;i<obj.length;i++){if(obj[i]!="")
{objField.options[i]=new Option();objField.options[i].text=obj[i];objField.options[i].value=obj[i];}}}
return;}
function Optpopulate1(obj1,obj2,elname)
{var objField=document.getElementById(elname);if(obj1.length!=0&&obj2.length!=0)
{objField.options[0]=new Option();objField.options[0].text="";objField.options[0].value="";for(var i=0;i<obj1.length;i++){if(obj1[i]!=""&&obj2[i]!="")
{objField.options[i+1]=new Option();objField.options[i+1].text=obj2[i];objField.options[i+1].value=obj1[i];}}}
return;}
function Optpopulate0(obj1,obj2,elname)
{var objField=document.getElementById(elname);if(obj1.length!=0&&obj2.length!=0)
{for(var i=0;i<obj1.length;i++){if(obj1[i]!=""&&obj2[i]!="")
{objField.options[i]=new Option();objField.options[i].text=obj2[i];objField.options[i].value=obj1[i];}}}
return;}
function check(obj)
{obj.value=obj.value+" ";return;}
function Numval(param)
{var curedit=3;var num=param.value;if(isWhitespace(num))
{param.value='';num=param.value;}
var i=0;var j=0;for(i=0;i<num.length;i++)
{if(num.charAt(i)==' ')
j++;else
break;}
num=num.substring(j,num.length);var k=0
if(num.charAt(num.length-1)==' ')
{for(i=num.length-1;i>=0;i--)
{if(num.charAt(i)==' ')
{k++;}
else
{break}}}
num=num.substring(0,num.length-k);var numlen=num.length;if(numlen==0)
{param.value='';return true;}
var num=param.value;var to=num.indexOf('.',0);if(isNaN(param.value))
{alert('Please enter a valid amount');param.value='';param.focus();return false;}
for(i=0;i<=num.length;i++)
{if(num.charAt(i)=='-')
{alert('Please enter a valid amount');param.value='';param.focus();return false;}}
if(num.indexOf('.')>-1)
{var v4=num.substring(num.indexOf('.')+1);if(v4.length>parseInt(curedit))
{if(curedit==0)
alert('Decimal digits not allowed for the selected currency');else
alert('Maximum Decimal digits allowed for the selected currency is '+curedit);param.value='';param.focus();return false;}}
return true;}
function isWhitespace(s)
{var reWhitespace=/^[ ]+$/
return(reWhitespace.test(s));}
function showtip(current,e,text)
{if(document.all)
{thetitle=text.split('<br>')
if(thetitle.length>1)
{thetitles=""
for(i=0;i<thetitle.length-1;i++)
thetitles+=thetitle[i]+"\r\n"
current.title=thetitles}
else
current.title=text}
else if(document.layers)
{document.tooltip.document.write('<layer bgColor="#FFFFE7" style="border:1px '+'solid black; font-size:12px;color:#000000;">'+text+'</layer>')
document.tooltip.document.close()
document.tooltip.left=e.pageX+5
document.tooltip.top=e.pageY+5
document.tooltip.visibility="show"}}
function hidetip()
{if(document.layers)
document.tooltip.visibility="hidden"}
function ProductFormat(accountnumarray,acctdescearray,curridarray)
{var acclen=accountnumarray.length;if(accountnumarray!=null)
{for(i=0;i<acclen;i++)
{accountnumarray[i]=accountnumarray[i]+" - "+acctdescearray[i]+" - "+curridarray[i];}}
return accountnumarray;}
function CardlessProductFormat(accountnumarray,acctdescearray)
{var acclen=accountnumarray.length;if(accountnumarray!=null)
{for(i=0;i<acclen;i++)
{accountnumarray[i]=accountnumarray[i]+" - "+acctdescearray[i];}}
return accountnumarray;}
function MobileFormat(accountnumarray,acctdescearray)
{var acclen=accountnumarray.length;if(accountnumarray!=null)
{for(i=0;i<acclen;i++)
{accountnumarray[i]=accountnumarray[i]+" - "+acctdescearray[i];}}
return accountnumarray;}
function SRAccountFormat(accountidarray)
{var acclen=accountidarray.length;if(accountidarray!=null)
{for(i=0;i<acclen;i++)
{accountidarray[i]=accountidarray[i].substring(0,1)+"-"+accountidarray[i].substring(1,11)+"-"+accountidarray[i].substring(11,accountidarray[i].length);}}
return accountidarray;}
function checkEmail(emailStr)
{var checkTLD=1;var knownDomsPat=/^(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum)$/;var emailPat=/^(.+)@(.+)$/;var specialChars="\\(\\)><@,;:\\\\\\\"\\.\\[\\]";var validChars="\[^\\s"+specialChars+"\]";var quotedUser="(\"[^\"]*\")";var ipDomainPat=/^\[(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})\]$/;var atom=validChars+'+';var word="("+atom+"|"+quotedUser+")";var userPat=new RegExp("^"+word+"(\\."+word+")*$");var domainPat=new RegExp("^"+atom+"(\\."+atom+")*$");var matchArray=emailStr.match(emailPat);if(matchArray==null)
{return false;}
var user=matchArray[1];var domain=matchArray[2];for(i=0;i<user.length;i++)
{if(user.charCodeAt(i)>127)
{return false;}}
for(i=0;i<domain.length;i++)
{if(domain.charCodeAt(i)>127)
{return false;}}
if(user.match(userPat)==null)
{return false;}
var IPArray=domain.match(ipDomainPat);if(IPArray!=null)
{for(var i=1;i<=4;i++)
{if(IPArray[i]>255)
{return false;}}
return true;}
var atomPat=new RegExp("^"+atom+"$");var domArr=domain.split(".");var len=domArr.length;for(i=0;i<len;i++)
{if(domArr[i].search(atomPat)==-1)
{return false;}}
if(checkTLD&&domArr[domArr.length-1].length!=2&&domArr[domArr.length-1].search(knownDomsPat)==-1)
{return false;}
if(len<2)
{return false;}
return true;}
function AmountFormat(Amount,Zeros)
{for(i=0;i<Zeros;i++)
addzero+='0';return Amount+addzero;}
function newcheckspecialChars(Field)
{var iChars="!@#$%^&*()+=-[]\\\';,./{}|\":<>?";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return true;}}}
function newblankspaceChars(Field)
{var iChars="       ";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return true;}}}
function newpercentagespecialChars(Field)
{var iChars="!@#$^&*()+=-[]\\\';,./{}|\":<>?";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return true;}}}
function checkAlphaNumeric(param)
{var numflag=false;var charflag=false;var val=param.value;for(var i=0;i<val.length;i++)
{var pos1=i;var pos2=i+1;var element=val.substring(parseInt(pos1),parseInt(pos2));if(isNaN(element))
{charflag=true;}
else
{numflag=true;}}
if(!numflag)
{return true;}
else if(!charflag)
{return true;}}
function containSameChars(myNewPassword,myOldPassword)
{var smallerLength;var matchingChars;var i;matchingChars=0;smallerLength=(myNewPassword.length>myOldPassword.length)?myOldPassword.length:myNewPassword.length;for(i=0;i<smallerLength;i++){if(myNewPassword.charAt(i)==myOldPassword.charAt(i)){matchingChars++;}}
if(matchingChars>2){return true;}
return false;}
function hidingIcon(obj)
{if(navigator.appName=='Netscape')
{document.getElementById(obj).style.visibility="hidden"}
else
{document.all[obj].style.visibility='hidden';}}
function checkValidDate(Field)
{var inDate=Field.value;var FName=Field.name;var i=0;var j=0;for(i=0;i<inDate.length;i++)
{if(inDate.charAt(i)==' ')
j++;else break;}
inDate=inDate.substring(j,inDate.length);var k=0;if(inDate.charAt(inDate.length-1)==' ')
{for(i=inDate.length-1;i>=0;i--)
{if(inDate.charAt(i)==' ')
k++;else break;}}
inDate=inDate.substring(0,inDate.length-k);if(inDate.length==0)
return false;else
{var daysInMonth=new Array(12);daysInMonth[1]=31;daysInMonth[2]=29;daysInMonth[3]=31;daysInMonth[4]=30;daysInMonth[5]=31;daysInMonth[6]=30;daysInMonth[7]=31;daysInMonth[8]=31;daysInMonth[9]=30;daysInMonth[10]=31;daysInMonth[11]=30;daysInMonth[12]=31;var sep='https://ebanking.ithmaarbank.com/';var strDate='';var strMonth='00';var strCon='0';var invalidDate=0;invalidDate=0;if(inDate.indexOf('-')>0)
sep='-';if(inDate.indexOf('.')>0)
sep='.';var inDay=inDate.substring(0,inDate.indexOf(sep));if(inDay.length>0&&inDay.length<=2)
{inDay=parseInt(inDay,10);}
else
{invalidDate=1;}
var inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));if(inMonth.length>0&&inMonth.length<=2)
{inMonth=parseInt(inMonth,10);}
else
{invalidDate=1;}
var inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);if(inYear.length<1||inYear.length>4||inYear.length==3)
{invalidDate=1;}
else
{inYear=parseInt(inYear,10);}
if(invalidDate==0)
{if(inYear<100&&inYear>40)
{inYear+=1900;}
if(inYear<100&&inYear<=40)
{inYear+=2000;}}
if(inMonth<1||inMonth>12)
{invalidDate=1;}
if((inDay<1)||(inDay>daysInMonth[inMonth]))
{invalidDate=1;}
if((inMonth==2)&&(inDay>(((inYear%4==0)&&(!(inYear%100==0)||(inYear%400==0)))?29:28)))
{invalidDate=1;}
if(invalidDate==1||isNaN(inDay)||isNaN(inMonth)||isNaN(inYear))
{return false;}
else
{return true;}}}
function checkInteger(s)
{var i;for(i=0;i<s.length;i++)
{var c=s.charAt(i);if(!isDigit(c))return false;}
return true;}
function isDigit(c)
{return((c>="0")&&(c<="9"))}
function DateValidation(dateFormat,dateField)
{var inDate=dateField.value;var consFormat=dateFormat.value;var daysInMonth=new Array(12);daysInMonth[1]=31;daysInMonth[2]=29;daysInMonth[3]=31;daysInMonth[4]=30;daysInMonth[5]=31;daysInMonth[6]=30;daysInMonth[7]=31;daysInMonth[8]=31;daysInMonth[9]=30;daysInMonth[10]=31;daysInMonth[11]=30;daysInMonth[12]=31;var inDay='';var inMonth='';var inYear='';var FormatSep='';var sep='https://ebanking.ithmaarbank.com/';var strDate='';var strMonth='00';var strCon='0';var invalidDate=0;if(inDate.indexOf('-')>0)
sep='-';if(inDate.indexOf('.')>0)
sep='.';if(consFormat.substring(0,2)=='dd')
{FormatSep=consFormat.substring(2,3);inDay=inDate.substring(0,inDate.indexOf(sep));inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);}
else if(consFormat.substring(0,2)=='MM')
{FormatSep=consFormat.substring(2,3);inMonth=inDate.substring(0,inDate.indexOf(sep));inDay=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);}
else
{FormatSep=consFormat.substring(4,5);inYear=inDate.substring(0,inDate.indexOf(sep));inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inDay=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);};invalidDate=0;if(inDay.length>0&&inDay.length<=2)
inDay=parseInt(inDay,10);else
invalidDate=1;if(inMonth.length>0&&inMonth.length<=2)
inMonth=parseInt(inMonth,10);else
invalidDate=1;if(inYear.length<1||inYear.length>4||inYear.length==3)
invalidDate=1;else
inYear=parseInt(inYear,10);if(invalidDate==0)
{if(inYear<100&&inYear>40)
inYear+=1900;if(inYear<100&&inYear<=40)
inYear+=2000;}
if(inMonth<1||inMonth>12)
invalidDate=1;if((inDay<1)||(inDay>daysInMonth[inMonth]))
invalidDate=1;if((inMonth==2)&&(inDay>(((inYear%4==0)&&(!(inYear%100==0)||(inYear%400==0)))?29:28)))
invalidDate=1;if(invalidDate==1||isNaN(inDay)||isNaN(inMonth)||isNaN(inYear))
{alert('Please Enter a Valid Date\r\nExpected Date Format is '+consFormat);return;}
else
{inDay=strCon+inDay;inMonth=strCon+inMonth;if(consFormat.substring(0,2)=='dd')
{strDate=inDay.substring(inDay.length-2,inDay.length)+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inYear;}
else if(consFormat.substring(0,2)=='MM')
{strDate=inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)+FormatSep+inYear;}
else
{strDate=inYear+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)};}
dateField.value=strDate;return;}
function checkWhitespace(Field)
{var inDate=Field.value;if(isWhitespace(inDate))
{Field.value='';inDate=Field.value;}
if(inDate.length!=0)
{var i=0;var j=0;for(i=0;i<inDate.length;i++)
{if(inDate.charAt(i)==' ')
j++;else break;}
inDate=inDate.substring(j,inDate.length);var k=0
if(inDate.charAt(inDate.length-1)==' ')
{for(i=inDate.length-1;i>=0;i--)
{if(inDate.charAt(i)==' ')
k++;else break;}}
inDate=inDate.substring(0,inDate.length-k);}
Field.value=inDate;}
function ValidateDate(theobj2,currdate,name,rule)
{var fromdt=theobj2.value
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
if(fromdt==""){return true;}
if(yearfrom==0)
{alert("Year cannot be zero");theobj2.focus();return false;}
for(idx1=0;idx1<fromdt.length;idx1++)
{ch1=fromdt.substring(idx1,idx1+1);if((ch1<"0")||(ch1>"9")){if(ch1=="https://ebanking.ithmaarbank.com/"){continue;}
else{alert("Invalid Entry: Enter date in format DD/MM/YYYY.")
theobj2.focus();return false;}}}
if(dayfrom<1||dayfrom>31){alert("Invalid Entry: "+name+" entered is invalid.")
theobj2.focus();return false;}
if(monfrom<1||monfrom>12){alert("Invalid Entry: Month should be between 01 and 12 in "+name);theobj2.focus();return false;}
var idx1=0;var ch1="";var idx2=0;var ch2="";if((monfrom==4||monfrom==6||monfrom==9||monfrom==11)&&dayfrom==31){alert("Invalid Entry: "+name+" entered is invalid.")
theobj2.focus();return false;}
if(monfrom==2||monfrom==02){var isleap1=(yearfrom%4==0&&(yearfrom%100!=0||yearfrom%400==0));if(dayfrom>29||(dayfrom==29&&!isleap1)){alert("Invalid Entry: "+name+" entered is invalid.")
theobj2.focus();return false;}}
if(currdate!=null&&rule!="gtdate")
{var Todt=theobj2.value;var firstslash1=currdate.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash1=currdate.lastIndexOf("https://ebanking.ithmaarbank.com/")
var currmon=currdate.substring(firstslash1+1,lastslash1)
var currday=currdate.substr(0,firstslash1)
var curryr=currdate.substr(lastslash1+1)
var firstslash2=Todt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash2=Todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=Todt.substr(lastslash2+1)
var monto=Todt.substring(firstslash2+1,lastslash2)
var dayto=Todt.substr(0,firstslash2)
if(theobj2.NotFuture=='true')
return true;var diff1=curryr-yearto;var mondiff1=currmon-monto;var daydiff1=currday-dayto;if(rule=='lt'&&(diff1>0||(diff1==0&&mondiff1>0)||(diff1==0&&mondiff1==0&&daydiff1>0))){alert("Invalid Entry :"+name+"  cannot be less than the Current Date");return false;}
else if(rule=='gt'&&(diff1>0||(diff1==0&&mondiff1>0)||(diff1==0&&mondiff1==0&&daydiff1>=0))){alert("Invalid Entry :"+name+"  should be greater than the Current Date");return false;}
else if(rule=='gt'&&(diff1<0||mondiff1<0||daydiff1<0)){return true;}
else if(rule=='lt'&&(diff1<0||mondiff1<0||daydiff1<0)){return true;}
else if(diff1>0){return true;}
else if(diff1==0&&mondiff1>0){return true;}
else if(diff1==0&&mondiff1==0&&daydiff1>=0){return true;}
else
{alert("Invalid Entry: "+name+"  should not be later than current date.")
theobj2.focus();return false;}}
return false;}
function checkIfDateValid(dateFormat,dateField)
{var inDate=dateField;if(inDate.length==0)
return false;var inDate=dateField;var consFormat=dateFormat;var daysInMonth=new Array(12);daysInMonth[1]=31;daysInMonth[2]=29;daysInMonth[3]=31;daysInMonth[4]=30;daysInMonth[5]=31;daysInMonth[6]=30;daysInMonth[7]=31;daysInMonth[8]=31;daysInMonth[9]=30;daysInMonth[10]=31;daysInMonth[11]=30;daysInMonth[12]=31;var inDay='';var inMonth='';var inYear='';var FormatSep='';var sep='https://ebanking.ithmaarbank.com/';var strDate='';var strMonth='00';var strCon='0';var invalidDate=0;if(inDate.indexOf('-')>0)
{sep='-';};if(inDate.indexOf('.')>0)
{sep='.';};if(consFormat.substring(0,2)=='dd')
{FormatSep=consFormat.substring(2,3);inDay=inDate.substring(0,inDate.indexOf(sep));inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);}
invalidDate=0;if(inDay.length>0&&inDay.length<=2)
{inDay=parseInt(inDay,10);}
else
{invalidDate=1;}
if(inMonth.length>0&&inMonth.length<=2)
{inMonth=parseInt(inMonth,10);}
else
{invalidDate=1;}
if(inYear.length<1||inYear.length>4||inYear.length==3)
{invalidDate=1;}
else
{inYear=parseInt(inYear,10);}
if(invalidDate==0)
{if(inYear<100&&inYear>40)
{inYear+=1900;}
if(inYear<100&&inYear<=40)
{inYear+=2000;}}
if(inMonth<1||inMonth>12)
{invalidDate=1;}
if((inDay<1)||(inDay>daysInMonth[inMonth]))
{invalidDate=1;}
if((inMonth==2)&&(inDay>(((inYear%4==0)&&(!(inYear%100==0)||(inYear%400==0)))?29:28)))
{invalidDate=1;}
if(invalidDate==1||isNaN(inDay)||isNaN(inMonth)||isNaN(inYear))
{return false;}
else
{inDay=strCon+inDay;inMonth=strCon+inMonth;if(consFormat.substring(0,2)=='dd')
{strDate=inDay.substring(inDay.length-2,inDay.length)+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inYear;}
else if(consFormat.substring(0,2)=='MM')
{strDate=inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)+FormatSep+inYear;}
else
{strDate=inYear+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)};}
return true;}
function checkdate_greaterThanToday(DateFormat,ActDate,Field,Message)
{var dateval=Field;if(dateval.length==0)
return;else
return validdate3(DateFormat,ActDate,Field,Message);}
function validdate3(DateFormat,ActDate,Field,Message)
{var Format=DateFormat;var Dchar=Format.charAt(0);dateTwo=Field;chkdate=ActDate;var td=new Date();var tday=td.getDate();var tmonth=td.getMonth()+1;var tyear=td.getYear()+1900;var sep;var inDay;var inMonth;var inYear;var inDay1;var inMonth1;var inYear1;var oneDateNum;var twoDateNum;if(Dchar=='D'||Dchar=='d')
{sep=Format.charAt(2);inDay=parseInt(dateTwo.substring(0,dateTwo.indexOf(sep)),10);inMonth=parseInt(dateTwo.substring(dateTwo.indexOf(sep)+1,dateTwo.lastIndexOf(sep)),10);inYear=parseInt(dateTwo.substring(dateTwo.lastIndexOf(sep)+1,dateTwo.length),10);twoDateNum=(inYear*10000)+(inMonth*100)+inDay;inDay1=parseInt(chkdate.substring(0,chkdate.indexOf(sep)),10);inMonth1=parseInt(chkdate.substring(chkdate.indexOf(sep)+1,chkdate.lastIndexOf(sep)),10);inYear1=parseInt(chkdate.substring(chkdate.lastIndexOf(sep)+1,chkdate.length),10);oneDateNum=(inYear1*10000)+(inMonth1*100)+inDay1;}
if(parseInt(twoDateNum)>=parseInt(oneDateNum))
{alert(Message);return false;}
return true;}
function validdate(DateFormat,ActDate,Field,Message)
{var Format=DateFormat;var Dchar=Format.charAt(0);dateTwo=Field;chkdate=ActDate;var td=new Date();var tday=td.getDate();var tmonth=td.getMonth()+1;var tyear=td.getYear()+1900;var sep;var inDay;var inMonth;var inYear;var inDay1;var inMonth1;var inYear1;var oneDateNum;var twoDateNum;if(Dchar=='D'||Dchar=='d')
{sep=Format.charAt(2);inDay=parseInt(dateTwo.substring(0,dateTwo.indexOf(sep)),10);inMonth=parseInt(dateTwo.substring(dateTwo.indexOf(sep)+1,dateTwo.lastIndexOf(sep)),10);inYear=parseInt(dateTwo.substring(dateTwo.lastIndexOf(sep)+1,dateTwo.length),10);twoDateNum=(inYear*10000)+(inMonth*100)+inDay;inDay1=parseInt(chkdate.substring(0,chkdate.indexOf(sep)),10);inMonth1=parseInt(chkdate.substring(chkdate.indexOf(sep)+1,chkdate.lastIndexOf(sep)),10);inYear1=parseInt(chkdate.substring(chkdate.lastIndexOf(sep)+1,chkdate.length),10);oneDateNum=(inYear1*10000)+(inMonth1*100)+inDay1;}
if(parseInt(twoDateNum)<parseInt(oneDateNum))
{alert(Message);return false;}
return true;}
function checkSMSGreaterDate(date1,date2)
{var fromdt=date1.value
var todt=date2.value
if((fromdt=="")&&(todt==""))return true;if(((fromdt!="")&&(todt==""))||((fromdt=="")&&(todt!="")))
{return false;}
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if(diff>0)
{return false;}
return true;}
function checkdate_cur(DateFormat,ActDate,Field,Message)
{var dateval=Field;if(dateval.length==0)
return;else
return validdate(DateFormat,ActDate,Field,Message);}
function checkdate_less(DateFormat,ActDate,Field,Message)
{var dateval=Field;if(dateval.length==0)
return;else
return validdate1(DateFormat,ActDate,Field,Message);}
function datedifference_valid(DateFormat,ActDate,Field)
{var Format=DateFormat;var Dchar=Format.charAt(0);dateTwo=Field;chkdate=ActDate;var td=new Date();var tday=td.getDate();var tmonth=td.getMonth()+1;var tyear=td.getYear()+1900;var sep;var inDay;var inMonth;var inYear;var inDay1;var inMonth1;var inYear1;var oneDateNum;var twoDateNum;if(Dchar=='D'||Dchar=='d')
{sep=Format.charAt(2);inDay=parseInt(dateTwo.substring(0,dateTwo.indexOf(sep)),10);inMonth=parseInt(dateTwo.substring(dateTwo.indexOf(sep)+1,dateTwo.lastIndexOf(sep)),10);inYear=parseInt(dateTwo.substring(dateTwo.lastIndexOf(sep)+1,dateTwo.length),10);twoDateNum=(inYear*10000)+(inMonth*100)+inDay;inDay1=parseInt(chkdate.substring(0,chkdate.indexOf(sep)),10);inMonth1=parseInt(chkdate.substring(chkdate.indexOf(sep)+1,chkdate.lastIndexOf(sep)),10)-1;inYear1=parseInt(chkdate.substring(chkdate.lastIndexOf(sep)+1,chkdate.length),10);oneDateNum=(inYear1*10000)+(inMonth1*100)+inDay1;}
if(parseInt(inYear1)>parseInt(inYear))
{if(parseInt(twoDateNum)>parseInt(oneDateNum)||(parseInt(inMonth)-parseInt(inMonth1))!=12||parseInt(inDay)<=parseInt(inDay1))
{return false;}
return true;}
else
{if(parseInt(twoDateNum)<parseInt(oneDateNum))
{return false;}
return true;}}
function checkGreaterDateUserProfile(date1,date2,description)
{var fromdt=date1.value
var todt=date2.value
if((fromdt=="")&&(todt==""))return true;if(((fromdt!="")&&(todt==""))||((fromdt=="")&&(todt!="")))
{alert('Invalid Entry: either enter both "From" and "To" dates or leave both dates blank.')
if(fromdt=="")
date1.focus();else
date2.focus();return false;}
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if(diff>0)
{alert("Validity End Date cannot be earlier than Validity Start Date.")
date1.focus();return false;}
return true;}
function checkOtherGreaterDate(date1,date2,description)
{var fromdt=date1.value
var todt=date2.value
if(todt=="")
return true;var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=secondDate-firstDate;if(diff>=0)
return true
else
{alert("Invalid Entry: "+description);date2.focus();return false;}}
function checkGreaterDatewithoutdependency(date1,date2,description)
{var fromdt=date1.value
var todt=date2.value
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if(diff>0)
{alert("\"From Date\" cannot be greater than \"To Date\"");date1.focus();return false;}
return true;}
function checkAlphaNumeric(param)
{var numflag=false;var charflag=false;var val=param.value;for(var i=0;i<val.length;i++)
{var pos1=i;var pos2=i+1;var element=val.substring(parseInt(pos1),parseInt(pos2));if(isNaN(element))
{charflag=true;}
else
{numflag=true;}}
if(!numflag)
{return true;}
else if(!charflag)
{return true;}}
function checkAlphaNumericChars(Field)
{var iChars="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";var charfield=Field.value;for(var i=0;i<charfield.length;i++)
{if(iChars.indexOf(charfield.charAt(i))==-1)
{return false;}}
return true;}
function checkBoxUnSelectAll(field1,field2)
{if(field2.checked==false&&field1.checked==true)
{field1.checked=false;}}
function Optpopulateall(obj1,obj2,elname)
{var objField=document.getElementById(elname);if(obj1.length!=0&&obj2.length!=0)
{objField.options[0]=new Option();objField.options[0].text="";objField.options[0].value="";objField.options[1]=new Option();objField.options[1].text="All";objField.options[1].value="All";for(var i=0;i<obj1.length;i++)
{if(obj1[i]!=""&&obj2[i]!="")
{objField.options[i+2]=new Option();objField.options[i+2].text=obj2[i];objField.options[i+2].value=obj1[i];}}}
return;}
function OptpopulateSelect(obj1,obj2,selectvalue,elname)
{var m=1;var objField=document.getElementById(elname);if(obj1.length!=0&&obj2.length!=0)
{objField.options[0]=new Option();objField.options[0].text="";objField.options[0].value="";for(var i=0;i<obj1.length;i++)
{if(obj1[i]!=""&&obj2[i]!="")
{if(obj1[i]!=selectvalue)
{objField.options[m]=new Option();objField.options[m].text=obj2[i];objField.options[m].value=obj1[i];m++;}}}}
return;}
function populateCombo(array1,array2,array3,obj,val)
{var j=0,entry=0;var dumarray1=new Array();var dumarray2=new Array();var nullarray=new Array();comboRemover(val);for(i=0;i<array1.length;i++)
{if(array1[i]==obj.value)
{dumarray1[j]=array2[i];dumarray2[j]=array3[i];j++;entry=1;}
else
{nullarray[j]="";}}
if(entry==1)
{Optpopulate1(dumarray1,dumarray2,val);}
else
{Optpopulate(nullarray,val);}}
function comboRemover(elname)
{var objField=document.getElementById(elname);for(var i=(objField.length-1);i>=0;i--)
{objField.remove(i);}
objField.options[0]=new Option();objField.options[0].text="";objField.options[0].value="";return;}
function checkBoxSelectAll(formObj,field1,field2)
{if(formObj!=null)
{var checkall=false;var length=formObj.elements.length;for(i=0;i<length;i++)
{if(formObj.elements[i].type=="checkbox")
{if(formObj.elements[i].name==field1&&formObj.elements[i].checked==true)
{checkall=true;continue;}
if(formObj.elements[i].type=="checkbox"&&formObj.elements[i].name==field2&&checkall)
{formObj.elements[i].checked=true;}
else
{formObj.elements[i].checked=false;}}}}}
function ltrim(s)
{return s.replace(/^\s*/,"");}
function rtrim(s)
{return s.replace(/\s*$/,"");}
function trim(s)
{return rtrim(ltrim(s));}
function checkdate_LesserThanToday(DateFormat,ActDate,Field,Message)
{var dateval=Field;if(dateval.length==0)
return;else
return validdatelesser(DateFormat,ActDate,Field,Message);}
function validdatelesser(DateFormat,ActDate,Field,Message)
{var Format=DateFormat;var Dchar=Format.charAt(0);dateTwo=Field;chkdate=ActDate;var td=new Date();var tday=td.getDate();var tmonth=td.getMonth()+1;var tyear=td.getYear()+1900;var sep;var inDay;var inMonth;var inYear;var inDay1;var inMonth1;var inYear1;var oneDateNum;var twoDateNum;if(Dchar=='D'||Dchar=='d')
{sep=Format.charAt(2);inDay=parseInt(dateTwo.substring(0,dateTwo.indexOf(sep)),10);inMonth=parseInt(dateTwo.substring(dateTwo.indexOf(sep)+1,dateTwo.lastIndexOf(sep)),10);inYear=parseInt(dateTwo.substring(dateTwo.lastIndexOf(sep)+1,dateTwo.length),10);twoDateNum=(inYear*10000)+(inMonth*100)+inDay;inDay1=parseInt(chkdate.substring(0,chkdate.indexOf(sep)),10);inMonth1=parseInt(chkdate.substring(chkdate.indexOf(sep)+1,chkdate.lastIndexOf(sep)),10);inYear1=parseInt(chkdate.substring(chkdate.lastIndexOf(sep)+1,chkdate.length),10);oneDateNum=(inYear1*10000)+(inMonth1*100)+inDay1;}
if(parseInt(twoDateNum)<parseInt(oneDateNum))
{alert(Message);return false;}
return true;}
function confirmAuthPassword(frm,selAuthId,selAuthPwd,spCharNotallowed,enterNumPwd,spaceNotAllowed,pwdMaxChar,pwdMinChar)
{if(frm.UserName.value=="")
{alert(selAuthId);frm.UserName.focus();frm.UserName.value="";return false;}
if((newcheckspecialChars(frm.UserName)))
{alert(spCharNotallowed);frm.UserName.focus();frm.UserName.value="";return false;}
if((newblankspaceChars(frm.UserName)))
{alert(spaceNotAllowed);frm.UserName.focus();frm.UserName.value="";return false;}
if(frm.authpassword.value=="")
{alert(selAuthPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newcheckspecialChars(frm.authpassword)))
{alert(spCharNotallowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((checkAlphaNumericChars(frm.authpassword)))
{alert(enterNumPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newblankspaceChars(frm.authpassword)))
{alert(spaceNotAllowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if(frm.authpassword.value.length>9)
{alert(pwdMaxChar);frm.authpassword.focus();return false;}
if(frm.authpassword.value.length<6)
{alert(pwdMinChar);frm.authpassword.focus();return false;}
return true;}
function confirmPassword(frm,selAuthPwd,spCharNotallowed,enterNumPwd,spaceNotAllowed,pwdMaxChar,pwdMinChar)
{if(frm.authpassword.value=="")
{alert(selAuthPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newcheckspecialChars(frm.authpassword)))
{alert(spCharNotallowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((checkAlphaNumericChars(frm.authpassword)))
{alert(enterNumPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newblankspaceChars(frm.authpassword)))
{alert(spaceNotAllowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if(frm.authpassword.value.length>4)
{alert(pwdMaxChar);frm.authpassword.focus();return false;}
if(frm.authpassword.value.length<4)
{alert(pwdMinChar);frm.authpassword.focus();return false;}
return true;}
function reconfirmPassword(frm,selAuthPwd,spCharNotallowed,enterNumPwd,spaceNotAllowed,pwdMaxChar,pwdMinChar)
{if(frm.authpassword.value=="")
{alert(selAuthPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newcheckspecialChars(frm.authpassword)))
{alert(spCharNotallowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((checkAlphaNumericChars(frm.authpassword)))
{alert(enterNumPwd);frm.authpassword.focus();frm.authpassword.value="";return false;}
if((newblankspaceChars(frm.authpassword)))
{alert(spaceNotAllowed);frm.authpassword.focus();frm.authpassword.value="";return false;}
if(frm.authpassword.value.length>9)
{alert(pwdMaxChar);frm.authpassword.focus();return false;}
if(frm.authpassword.value.length<6)
{alert(pwdMinChar);frm.authpassword.focus();return false;}
return true;}
function onConfirmAuth()
{document.onkeypress=onConfirmKeyPress;}
function onConfirmKeyPress(evt)
{var oEvent=(window.event)?window.event:evt;var nKeyCode=oEvent.keyCode?oEvent.keyCode:oEvent.which?oEvent.which:void 0;if(nKeyCode==13)
{return false;}
return true;}
function checkspecialCharsBeneficiary(Field){var iChars="`~!@#$%^&*()+=-[]\\\';/{}|\"<>?";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return false;}}
return true;}
function newspecialChars(Field)
{var iChars="!@#$^&*()+=-[]\\\';,./{}|\":<>?.";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return true;}}}
function newcheckspecialPwdChars(Field)
{var iChars="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";var charfield=Field.value;for(var i=0;i<charfield.length;i++)
{if(!(iChars.indexOf(charfield.charAt(i))!=-1))
{return true;}}
return false;}
var message1="Sorry, Refresh Function is disabled.\nClick 'OK' to Proceed.";var message2="Sorry, New Window Function is disabled.\nClick 'OK' to Proceed.";var message3="Sorry, Shift Key is disabled.\nClick 'OK' to Proceed.";var asciiF5=116;var ctrlR=114;var ctrlN=110;if(document.all)
{}
else if(document.layers||document.getElementById)
{document.onkeypress=onKeyPress;}
function onKeyPress(evt)
{var oEvent=(window.event)?window.event:evt;var nKeyCode=oEvent.keyCode?oEvent.keyCode:oEvent.which?oEvent.which:void 0;var nCtrlKeyCode=oEvent.ctrlKey?oEvent.ctrlKey:oEvent.which?oEvent.which:void 0;var bIsFunctionKey=false;if(nKeyCode==asciiF5)
{bIsFunctionKey=asciiF5;}
if(nCtrlKeyCode==true&&nKeyCode==ctrlR)
{bIsFunctionKey=ctrlR;}
if(nCtrlKeyCode==true&&nKeyCode==ctrlN)
{bIsFunctionKey=ctrlN;}
var sChar=String.fromCharCode(nKeyCode).toUpperCase();var oTarget=(oEvent.target)?oEvent.target:oEvent.srcElement;var sTag=oTarget.tagName.toLowerCase();var sTagType=oTarget.getAttribute("type");var bRet=true;if(sTagType!=null)
{sTagType=sTagType.toLowerCase();}
if(bIsFunctionKey&&nKeyCode!=nCtrlKeyCode)
{bRet=false;}
if(!bRet)
{try
{oEvent.returnValue=false;oEvent.cancelBubble=true;if(!document.all)
{oEvent.preventDefault();oEvent.stopPropagation();}
if((nKeyCode==nCtrlKeyCode)||((nCtrlKeyCode==true)&&(nKeyCode==116)))
{return bRet;}else{if(nKeyCode==ctrlN)
{alert(message2);}}}
catch(ex)
{}}
return bRet;}
function disableF5Key()
{if(window.event&&window.event.keyCode==116)
{window.event.keyCode=0;alert(message1);return false;}
if(window.event.ctrlKey&&window.event.keyCode==82)
{window.event.keyCode=0;alert(message1);return false;}
if(window.event.ctrlKey&&window.event.keyCode==78)
{window.event.keyCode=0;alert(message2);return false;}}
function onConfirmAuth()
{document.onkeypress=onConfirmKeyPress;}
function onConfirmKeyPress(evt)
{var oEvent=(window.event)?window.event:evt;var nKeyCode=oEvent.keyCode?oEvent.keyCode:oEvent.which?oEvent.which:void 0;if(nKeyCode==13)
{return false;}
return true;}
function checkspecialCharsNonMandatory(Field)
{var iChars="!,%@#$^&*()+=[]\\\';/{}|\.<>?ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz  ";var charfield=Field.value;for(var i=0;i<charfield.length;i++)
{if(iChars.indexOf(charfield.charAt(i))!=-1)
{return true;}}
if((Field=="")||isNaN(parseFloat(Field)))
{return false;}}
function AccountFormatReplace(accountNum,payType)
{if(payType=='I')
{var branchcode=accountNum.substring(0,3);var brachcodetoappend='';;if(branchcode=='271'){brachcodetoappend='01';}else if(branchcode=='274'){brachcodetoappend='02';}else if(branchcode=='275'){brachcodetoappend='03';}else if(branchcode=='275'){brachcodetoappend='04';}
if(brachcodetoappend!='')
{accountNum=brachcodetoappend+accountNum.substring(3,16)}}
return accountNum;}
function DaysArray(n){for(var i=1;i<=n;i++){this[i]=31
if(i==4||i==6||i==9||i==11){this[i]=30}
if(i==2){this[i]=29}}
return this}
function daysInFebruary(year){return(((year%4==0)&&((!(year%100==0))||(year%400==0)))?29:28);}
function DaysArray(n){for(var i=1;i<=n;i++){this[i]=31
if(i==4||i==6||i==9||i==11){this[i]=30}
if(i==2){this[i]=29}}
return this}
function stripCharsInBag(s,bag){var i;var returnString="";for(i=0;i<s.length;i++){var c=s.charAt(i);if(bag.indexOf(c)==-1)returnString+=c;}
return returnString;}
function isInteger(s){var i;for(i=0;i<s.length;i++){var c=s.charAt(i);if(((c<"0")||(c>"9")))return false;}
return true;}
function isDate(dtStr,selvaliddate,selvalidmonth,selvalidday,selvalidyear,seland,seldateformat)
{var dtCh="https://ebanking.ithmaarbank.com/";var minYear=1900;var maxYear=2100;var daysInMonth=DaysArray(12)
var pos1=dtStr.indexOf(dtCh)
var pos2=dtStr.indexOf(dtCh,pos1+1)
var strDay=dtStr.substring(0,pos1)
var strMonth=dtStr.substring(pos1+1,pos2)
var strYear=dtStr.substring(pos2+1)
if(strDay.length<2)
{return false}
if(strMonth.length<2)
{return false}
if(strMonth.length>2)
{return false}
strYr=strYear
if(strDay.charAt(0)=="0"&&strDay.length>1)strDay=strDay.substring(1)
if(strMonth.charAt(0)=="0"&&strMonth.length>1)strMonth=strMonth.substring(1)
for(var i=1;i<=3;i++){if(strYr.charAt(0)=="0"&&strYr.length>1)strYr=strYr.substring(1)}
month=parseInt(strMonth)
day=parseInt(strDay)
year=parseInt(strYr)
if(pos1==-1||pos2==-1)
{return false}
if(strMonth.length<1||month<1||month>12)
{return false}
if(strDay.length<1||day<1||day>31||(month==2&&day>daysInFebruary(year))||day>daysInMonth[month])
{return false}
if(strYear.length!=4||year==0||year<minYear||year>maxYear)
{return false}
if(dtStr.indexOf(dtCh,pos2+1)!=-1||isInteger(stripCharsInBag(dtStr,dtCh))==false){alert(selvaliddate)
return false}
return true}
function compareDate(dateObj1,dateObj2)
{var startDate=dateObj1.value;var endDate=dateObj2.value;var separator="https://ebanking.ithmaarbank.com/";var fromDateArray=new Array();var toDateArray=new Array();fromDateArray=startDate.split(separator);toDateArray=endDate.split(separator);if(toDateArray[1].length==1)
{toDateArray[1]='0'+toDateArray[1]}
if(fromDateArray[1].length==1)
{fromDateArray[1]='0'+fromDateArray[1]}
if(toDateArray[0].length==1)
{toDateArray[0]='0'+toDateArray[0]}
if(fromDateArray[0].length==1)
{fromDateArray[0]='0'+fromDateArray[0]}
if(toDateArray[2]<fromDateArray[2])
{return false;}
if((toDateArray[2]==fromDateArray[2])&&(toDateArray[1]<fromDateArray[1]))
{return false;}
if((toDateArray[2]==fromDateArray[2])&&(toDateArray[1]==fromDateArray[1])&&(toDateArray[0]<fromDateArray[0]))
{return false;}
return true;}
function checkGreaterDatewithoutdependencyBillPayments(date1,date2,description)
{var fromdt=date1.value
var todt=date2.value
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if((diff!=0))
{if(diff<0){return false;}}
return true;}
function checkGreaterDateTransfer(date1,date2,description)
{var fromdt=date1.value
var todt=date2.value
var firstslash=fromdt.indexOf("https://ebanking.ithmaarbank.com/")
var lastslash=fromdt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearfrom=fromdt.substr(lastslash+1)
var monfrom=fromdt.substring(firstslash+1,lastslash)
var dayfrom=fromdt.substr(0,firstslash)
fromdt=monfrom+"/"+dayfrom+"/"+yearfrom;var todt=date2.value
firstslash=todt.indexOf("https://ebanking.ithmaarbank.com/")
lastslash=todt.lastIndexOf("https://ebanking.ithmaarbank.com/")
var yearto=todt.substr(lastslash+1)
var monto=todt.substring(firstslash+1,lastslash)
var dayto=todt.substr(0,firstslash)
todt=monto+"/"+dayto+"/"+yearto;firstDate=Date.parse(fromdt);secondDate=Date.parse(todt);var chk=true;diff=firstDate-secondDate;if((diff!=0))
{if(diff<0){return false;}}
return true;}
function getDescDataPreSet(descArray,codeArray,theObj,descObj)
{for(var i=0;i<descArray.length;i++)
{var selectedid=getSelectedListValue(theObj);if(selectedid==codeArray[i])
{descObj.value=descArray[i];break;}}
if(0==theObj.selectedIndex)
{descObj.value="";}}
function is_Date(dtStr,selvaliddate,selvalidmonth,selvalidday,selvalidyear,seland,seldateformat)
{var dtCh="https://ebanking.ithmaarbank.com/";var minYear=1900;var maxYear=2100;var daysInMonth=DaysArray(12)
var pos1=dtStr.indexOf(dtCh)
var pos2=dtStr.indexOf(dtCh,pos1+1)
var strDay=dtStr.substring(0,pos1)
var strMonth=dtStr.substring(pos1+1,pos2)
var strYear=dtStr.substring(pos2+1)
if(strDay.length<2)
{alert(seldateformat)
return false}
if(strMonth.length<2)
{alert(seldateformat)
return false}
if(strMonth.length>2)
{alert(seldateformat)
return false}
strYr=strYear
if(strDay.charAt(0)=="0"&&strDay.length>1)strDay=strDay.substring(1)
if(strMonth.charAt(0)=="0"&&strMonth.length>1)strMonth=strMonth.substring(1)
for(var i=1;i<=3;i++){if(strYr.charAt(0)=="0"&&strYr.length>1)strYr=strYr.substring(1)}
month=parseInt(strMonth)
day=parseInt(strDay)
year=parseInt(strYr)
if(pos1==-1||pos2==-1)
{alert(selvaliddate)
return false}
if(strMonth.length<1||month<1||month>12)
{alert(selvalidmonth)
return false}
if(strDay.length<1||day<1||day>31||(month==2&&day>daysInFebruary(year))||day>daysInMonth[month])
{alert(selvalidday)
return false}
if(strYear.length!=4||year==0||year<minYear||year>maxYear)
{alert(selvalidyear+" "+minYear+" and "+maxYear)
return false}
if(dtStr.indexOf(dtCh,pos2+1)!=-1||isInteger(stripCharsInBag(dtStr,dtCh))==false){alert(selvaliddate)
return false}
return true}
function Optpopulate(obj,elname)
{var objField=document.getElementById(elname);if(obj.length!=0)
{objField.options[0]=new Option();for(var i=0;i<obj.length;i++)
{if(obj[i]!="")
{objField.options[i+1]=new Option();objField.options[i+1].text=obj[i];objField.options[i+1].value=obj[i];}}}
else if(obj.length==0)
{objField.options[0]=new Option();}
return;}
window.onerror=null;var bName=navigator.appName;var bVer=parseInt(navigator.appVersion);var NS4=(bName=="Netscape"&&bVer>=4);var IE4=(bName=="Microsoft Internet Explorer"&&bVer>=4);var NS3=(bName=="Netscape"&&bVer<4);var IE3=(bName=="Microsoft Internet Explorer"&&bVer<4);var blink_speed=500;var i=0;if(NS4||IE4){if(navigator.appName=="Netscape"){layerStyleRef="layer.";layerRef="document.layers";styleSwitch="";}else{layerStyleRef="layer.style.";layerRef="document.all";styleSwitch=".style";}}
function Blink(layerName){if(fg=="HIDE")
{document.getElementById(layerName).style.visibility='hidden'}
else
{if(NS4||IE4)
{if(i%2==0)
{eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="visible"');}
else
{eval(layerRef+'["'+layerName+'"]'+styleSwitch+'.visibility="hidden"');}}}
if(i<1)
{i++;}
else
{i--}
setTimeout("Blink('"+layerName+"')",blink_speed);}
function GetTagValues_Ajax(b,elename)
{var obj=b.getElementsByTagName(elename);var arrValues=new Array();for(var i=0;i<obj.length;i++)
{arrValues[i]=obj.item(i).firstChild.nodeValue;}
return arrValues;}
function GetTagValue_Ajax(b,elename)
{var obj=null;obj=b.getElementsByTagName(elename);var strValue='';if(obj!=null)
{if(obj.length>0)
{if((obj.item(0).childNodes.length)<=0)
{strValue='';}
else
{strValue=obj.item(0).firstChild.nodeValue;}}
else
{strValue='';}}
return strValue;}
function isDateValid(dtStr){var daysInMonth=DaysArray(12)
var pos1=dtStr.indexOf(dtCh)
var pos2=dtStr.indexOf(dtCh,pos1+1)
var strDay=dtStr.substring(0,pos1)
var strMonth=dtStr.substring(pos1+1,pos2)
var strYear=dtStr.substring(pos2+1)
strYr=strYear
if(strDay.charAt(0)=="0"&&strDay.length>1)strDay=strDay.substring(1)
if(strMonth.charAt(0)=="0"&&strMonth.length>1)strMonth=strMonth.substring(1)
for(var i=1;i<=3;i++){if(strYr.charAt(0)=="0"&&strYr.length>1)strYr=strYr.substring(1)}
month=parseInt(strMonth)
day=parseInt(strDay)
year=parseInt(strYr)
if(pos1==-1||pos2==-1){return false}
if(strMonth.length<1||month<1||month>12){return false}
if(strDay.length<1||day<1||day>31||(month==2&&day>daysInFebruary(year))||day>daysInMonth[month]){return false}
if(strYear.length!=4||year==0||year<minYear||year>maxYear){return false}
if(dtStr.indexOf(dtCh,pos2+1)!=-1||isInteger(stripCharsInBag(dtStr,dtCh))==false){return false}
return true}
function setLovValues1(lovName,lovValue)
{var i;for(i=0;i<lovName.options.length;i++)
{var lovNameValue="";lovNameValue=lovName.options[i].value;if(lovNameValue.indexOf("-")>-1){lovNameValue=lovNameValue.substring(0,lovNameValue.indexOf("-"));lovNameValue=trim(lovNameValue);}
if(lovNameValue==lovValue){lovName.options[i].selected=true;}}}
function OptpopulateByFrmObj(obj,objField)
{if(obj.length!=0)
{for(var i=0;i<obj.length;i++){if(obj[i]!=""){objField.options[i]=new Option();objField.options[i].text=obj[i];objField.options[i].value=obj[i];}}}
else if(obj.length==0){objField.options[0]=new Option();}
return;}
function Optpopulate1ByFrmObj(obj,objField)
{if(obj.length!=0)
{for(var i=0;i<obj.length;i++){if(obj[i]!=""){objField.options[i+1]=new Option();objField.options[i+1].text=obj[i];objField.options[i+1].value=obj[i];}}}
else if(obj.length==0){objField.options[0]=new Option();}
return;}
function Trimspace(Field)
{var inDate=Field.value;if(isWhitespace(inDate))
{Field.value='';inDate=Field.value;}
if(inDate.length!=0)
{var i=0;var j=0;for(i=0;i<inDate.length;i++)
{if(inDate.charAt(i)==' ')
{j++;}
else
{break;}}
inDate=inDate.substring(j,inDate.length);var k=0
if(inDate.charAt(inDate.length-1)==' ')
{for(i=inDate.length-1;i>=0;i--)
{if(inDate.charAt(i)==' ')
{k++;}
else
{break;}}}
inDate=inDate.substring(0,inDate.length-k);}
Field.value=inDate;}
function isValidDigits(param,decimal)
{var num=WhiteSpace(param);if(num.length==0)
return;var numlen=num.length;var to=num.indexOf('.',0);if(decimal==0&&to!=-1)
{alert('Decimal digits not allowed for the selected currency');param.value='';param.focus();return false;}
var intAmount=num;if(to!=-1)
{var intAmount=num.substring(0,to);}
if(intAmount.length>12)
{alert('Invalid Amount ');param.value='';param.focus();return false;}
if(isNaN(num))
{alert('Invalid number\r\nExpected Format is 999.999 or 999');param.value='';param.focus();return false;}
for(i=0;i<=num.length;i++)
{if(num.charAt(i)=='-')
{alert('Invalid number\r\nExpected Format is 999.999');param.value='';param.focus();return false;}}
if(parseInt(num)==0)
{alert('Invalid Amount');param.value='';param.focus();return false;}
if(parseInt(to)!=(parseInt(numlen)-decimal))
{if(parseInt(to)==-1)
{param.value=num;return true;}
else
if((parseInt(numlen)-parseInt(to))>(parseInt(decimal)+1))
{alert('Maximum allowed decimal is '+decimal);param.value='';param.focus();return false;}}
param.value=num;return true;}
function WhiteSpace(Field)
{var inDate=Field.value;if(isWhitespace(inDate))
{Field.value='';inDate=Field.value;}
if(inDate.length!=0)
{var i=0;var j=0;for(i=0;i<inDate.length;i++)
{if(inDate.charAt(i)==' ')
{j++;}
else
{break;}}
inDate=inDate.substring(j,inDate.length);var k=0
if(inDate.charAt(inDate.length-1)==' ')
{for(i=inDate.length-1;i>=0;i--)
{if(inDate.charAt(i)==' ')
{k++;}
else
{break;}}}
inDate=inDate.substring(0,inDate.length-k);}
return inDate;}
function isEmptySelect(param1,param2)
{if(param1.options[param1.selectedIndex].value=='')
{param1.focus();return true;}
return false;}
function DateVal(dateFormat,dateField)
{var inDate=WhiteSpace(dateField);if(inDate.length==0)
return;var consFormat=dateFormat.value;var daysInMonth=new Array(12);daysInMonth[1]=31;daysInMonth[2]=29;daysInMonth[3]=31;daysInMonth[4]=30;daysInMonth[5]=31;daysInMonth[6]=30;daysInMonth[7]=31;daysInMonth[8]=31;daysInMonth[9]=30;daysInMonth[10]=31;daysInMonth[11]=30;daysInMonth[12]=31;var inDay='';var inMonth='';var inYear='';var FormatSep='';var sep='https://ebanking.ithmaarbank.com/';var strDate='';var strMonth='00';var strCon='0';var invalidDate=0;if(inDate.indexOf('-')>0)
{sep='-';};if(inDate.indexOf('.')>0)
{sep='.';};if(consFormat.substring(0,2)=='DD')
{FormatSep=consFormat.substring(2,3);inDay=inDate.substring(0,inDate.indexOf(sep));inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);}
else if(consFormat.substring(0,2)=='MM')
{FormatSep=consFormat.substring(2,3);inMonth=inDate.substring(0,inDate.indexOf(sep));inDay=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inYear=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);}
else
{FormatSep=consFormat.substring(4,5);inYear=inDate.substring(0,inDate.indexOf(sep));inMonth=inDate.substring(inDate.indexOf(sep)+1,inDate.lastIndexOf(sep));inDay=inDate.substring(inDate.lastIndexOf(sep)+1,inDate.length);};invalidDate=0;if(inDay.length>0&&inDay.length<=2)
{inDay=parseInt(inDay,10);}
else
{invalidDate=1;}
if(inMonth.length>0&&inMonth.length<=2)
{inMonth=parseInt(inMonth,10);}
else
{invalidDate=1;}
if(inYear.length<1||inYear.length>4||inYear.length==3)
{invalidDate=1;}
else
{inYear=parseInt(inYear,10);}
if(invalidDate==0)
{if(inYear<100&&inYear>40)
{inYear+=1900;}
if(inYear<100&&inYear<=40)
{inYear+=2000;}}
if(inMonth<1||inMonth>12)
{invalidDate=1;}
if((inDay<1)||(inDay>daysInMonth[inMonth]))
{invalidDate=1;}
if((inMonth==2)&&(inDay>(((inYear%4==0)&&(!(inYear%100==0)||(inYear%400==0)))?29:28)))
{invalidDate=1;}
if(invalidDate==1||isNaN(inDay)||isNaN(inMonth)||isNaN(inYear))
{dateField.value='';dateField.focus();return true;}
else
{inDay=strCon+inDay;inMonth=strCon+inMonth;if(consFormat.substring(0,2)=='DD')
{strDate=inDay.substring(inDay.length-2,inDay.length)+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inYear;}
else if(consFormat.substring(0,2)=='MM')
{strDate=inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)+FormatSep+inYear;}
else
{strDate=inYear+FormatSep+inMonth.substring(inMonth.length-2,inMonth.length)+FormatSep+inDay.substring(inDay.length-2,inDay.length)};}
dateField.value=strDate;dateField.focus();return false;}
function isBlank(field)
{if(field.value==''||isWhitespace(field.value))
{field.value='';field.focus();return true;}
else
{return false;}}
function ProductFormat1(accountnumarray,acctdescearray)
{var acclen=accountnumarray.length;if(accountnumarray!=null)
{for(i=0;i<acclen;i++)
{accountnumarray[i]=accountnumarray[i]+" - "+acctdescearray[i];}}
return accountnumarray;}
function getDescDataOnLoad(descArray,codeArray,theObj,descObj)
{for(var i=0;i<descArray.length;i++)
{var selectedid=getSelectedListValue(theObj);var desObjValue=descArray[i];if(selectedid==codeArray[i])
{if(desObjValue.indexOf("-")>-1){descObj.value=descArray[i].substring(0,descArray[i].indexOf("-"));descObj.value=trim(descObj.value);}else{descObj.value=descArray[i];}
break;}}}
function OptpopulateBy0FrmObj(obj,objField)
{if(obj.length!=0)
{for(var i=0;i<obj.length;i++){if(obj[i]!=""){objField.options[i+1]=new Option();objField.options[i+1].text=obj[i];objField.options[i+1].value=obj[i];}}}
else if(obj.length==0){objField.options[0]=new Option();}
return;}
function GetTagValues_Ajax(b,elename)
{var obj=b.getElementsByTagName(elename);var arrValues=new Array();for(var i=0;i<obj.length;i++)
{arrValues[i]=obj.item(i).firstChild.nodeValue;}
return arrValues;}
function formatRequestDate(strDate)
{var strDay="";var strMonth="";var strYear="";var strReturnDate=strDate;strDay=strDate.substring(0,strDate.indexOf("https://ebanking.ithmaarbank.com/"));strMonth=strDate.substring(strDate.indexOf("https://ebanking.ithmaarbank.com/")+1,strDate.lastIndexOf("https://ebanking.ithmaarbank.com/"));strYear=strDate.substring(strDate.lastIndexOf("https://ebanking.ithmaarbank.com/")+1,strDate.length);if(strDay.length==1)
strDay="0"+strDay;if(strMonth.length==1)
strMonth="0"+strMonth;strReturnDate=strYear+strMonth+strDay;return strReturnDate;}
function page(url,formname,butname){document.forms[formname].action=url;document.forms[formname].target="_self";document.forms[formname].method="post";document.getElementById(butname).disabled=true;document.getElementById(butname).style.color='#999999';document.forms[formname].submit();}
function page1(url,formname,butname1,butname2){document.forms[formname].action=url;document.forms[formname].target="_self";document.forms[formname].method="post";document.getElementById(butname1).disabled=true;document.getElementById(butname1).style.color='#999999';document.getElementById(butname2).disabled=true;document.getElementById(butname2).style.color='#999999';document.forms[formname].submit();}
function getDescData1(descArray,codeArray,theObj,descObj)
{for(var i=0;i<descArray.length;i++)
{var selectedid=getSelectedListValue(theObj);var desObjValue=descArray[i];if(selectedid==codeArray[i])
{descObj.value=descArray[i];break;}}}
function nohide(url,formname,butname){document.forms[formname].target="_self";document.forms[formname].method="post";document.forms[formname].action=url;document.forms[formname].submit();}
function formatResponseDate(strDate)
{var strDay="";var strMonth="";var strYear="";var strReturnDate=strDate;strDay=strDate.substring(6,strDate.length);strMonth=strDate.substring(4,6);strYear=strDate.substring(0,4);strReturnDate=strDay+"/"+strMonth+"/"+strYear;return strReturnDate;}
function dateFormate(dtvalue)
{var firstslash=dtvalue.indexOf("https://ebanking.ithmaarbank.com/");var lastslash=dtvalue.lastIndexOf("https://ebanking.ithmaarbank.com/");var yearfrom=dtvalue.substr(lastslash+1);var monfrom=dtvalue.substring(firstslash+1,lastslash);var dayfrom=dtvalue.substr(0,firstslash);strReturnDate=yearfrom+monfrom+dayfrom;return strReturnDate;}
var Message='Welcome to Trexlore Bank Internet Retail Banking';var place=1;function scrollIn()
{window.status=Message.substring(0,place);if(place>=Message.length)
{place=1;window.setTimeout("scrollOut()",300);}
else
{place++;window.setTimeout("scrollIn()",50);}}
function scrollOut()
{window.status=Message.substring(place,Message.length);if(place>=Message.length)
{place=1;window.setTimeout("scrollIn()",100);}
else
{place++;window.setTimeout("scrollOut()",50);}}
function newlogincheckspecialChars(Field)
{var iChars="!@#$%^&*()+=-[]\\\';,./{}|\":<>?abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";var charfield=Field.value;for(var i=0;i<charfield.length;i++){if(iChars.indexOf(charfield.charAt(i))!=-1){return true;}}}
function ValidateRepeatDigits(str)
{var password=str.value;var pwdpos=password.charAt(0)+'';for(var i=1;i<password.length;i++){pwdpos=pwdpos+password.charAt(0);}
if(password==pwdpos){return true;}
return false;}
function page2(url,formname,butname1,butname2,butname3){document.forms[formname].action=url;document.forms[formname].target="_self";document.forms[formname].method="post";document.getElementById(butname1).disabled=true;document.getElementById(butname1).style.color='#999999';document.getElementById(butname2).disabled=true;document.getElementById(butname2).style.color='#999999';document.getElementById(butname3).disabled=true;document.getElementById(butname3).style.color='#999999';document.forms[formname].submit();}
function formatReqDate(strDate)
{var strDay="";var strMonth="";var strYear="";var strReturnDate=strDate;strDay=strDate.substring(0,strDate.indexOf("https://ebanking.ithmaarbank.com/"));strMonth=strDate.substring(strDate.indexOf("https://ebanking.ithmaarbank.com/")+1,strDate.lastIndexOf("https://ebanking.ithmaarbank.com/"));strYear=strDate.substring(strDate.lastIndexOf("https://ebanking.ithmaarbank.com/")+1,strDate.length);if(strDay.length==1)
strDay="0"+strDay;if(strMonth.length==1)
strMonth="0"+strMonth;strReturnDate=strYear+strMonth+strDay;return strReturnDate;}
function openpopupwindow(url,height,width)
{var options="fullscreen=no,Toolbar = no, status=no,scrollbars=yes,resizable=yes,menubar=no,width="+width+",height="+height;var OpenWin=window.open(url,"PopupWindow",options);}
function hidingIcon(obj)
{if(navigator.appName=='Netscape')
{document.getElementById(obj).style.visibility="hidden"}
else if(document.all)
{document.all[obj].style.visibility='hidden';}}
function returntabposition(obj,frmname){var indexNo=obj.tabIndex;var keyCode=event.keyCode;var ele=document.getElementById(frmname).elements[indexNo];if(keyCode==13){event.keyCode=0;ele.focus();ele.select();}}
function setformfocus(field){field.focus();}
function chkvalidamt(varamount,varcurrency)
{var varcurrencyval=varcurrency.value;var varamountval=varamount.value;if((varcurrencyval=='JOD')||(varcurrencyval=='KWD')||(varcurrencyval=='OMR')||(varcurrencyval=='QAR')||(varcurrencyval=='BHD'))
{if((varamountval.indexOf('0.000'))!=-1)
{varamount.focus();varamount.value="";return false;}}else{if((varamountval.indexOf('0.00'))!=-1)
{varamount.focus();varamount.value="";return false;}}
return true;}