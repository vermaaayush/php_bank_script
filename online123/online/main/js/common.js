/**********************************************************
 *                                                        *
 *  Copyright ©2005  Corillian Corporation                *
 *                                                        *
 *  All rights reserved.                                  *
 *                                                        *
 *  Highly Confidential.                                  *
 *                                                        *
 *  No portion of this code may be reproduced,            *
 *  transmitted or distributed without the express        *
 *  written permission of Corillian Corporation.          *
 *                                                        *
 **********************************************************/
 
//funcion to open the popup window.
function popupWindow(url, winOptions)
{	
	var winOpen = window.open(url,'_new',winOptions,false);
}

///Function to Print the  <Div> Content to the Printer.
function printField(divname) {
				var dctl =	document.getElementById(divname);	
				if (dctl == null)
					return false;
				pWin = window.open('BOWPrint','pWin','location=false, menubar=yes, height = 500, width=500,  toolbar=yes, scrollbars=yes'); 
				if (pWin == null)
					return false;
				pWin.document.open(); 
				pWin.document.write('<html><head>'); 
				pWin.document.write('<link href="/BOW/Themes/BOW/TopTabMenu/CSS/global_all.css" type="text/css" rel="stylesheet" media="all" />');
				pWin.document.write('<link href="/BOW/Themes/BOW/TopTabMenu/CSS/global_screen.css" type="text/css" rel="stylesheet" media="all" />');
				pWin.document.write('<link href="/BOW/Themes/BOW/TopTabMenu/CSS/global_print.css" type="text/css" rel="stylesheet" media="all" />');
				pWin.document.write('</head><body>'); 
				pWin.document.write('<img src="/BOW/Themes/BOW/TopTabMenu/Images/stdlogobw.gif" width="244" height="25" alt="[Bank Of West]">');
				pWin.document.write('<br/><br/>');
				pWin.document.write(dctl.innerHTML); 
				pWin.document.write('</body></html>'); 
				
				copyCheckboxesState(document, pWin.document);
				
				pWin.print(); 
				pWin.document.close(); 
				pWin.close(); 
				return false;
}

// This is needed since printField is only copying markup to document in popup window (through the
// use of document.innerHTML. For more details refer to defect Cori00094207.
function copyCheckboxesState(sourceNode, targetNode)
{
	try
	{
		var checks = sourceNode.getElementsByTagName('input');
		for(i=0; i<checks.length; i++)
		{
			if (checks[i].checked)
			{
				var id = checks[i].id;
				var check = targetNode.getElementById(id);
				check.checked = true;
			}
		}
	}
	catch (err)
	{
	}
}

function printPage(){
	try{
		window.print();
	}
	catch(err){
		// Do Nothing
	}
}


//Will be used popup window to assign the Parent Window URL
var strParentWindowURL = "";
//  Check Whether the Parent window is closed.If parent window closed or pointing to different URL  //
//  Close this child window. //
function CloseifParentWindowIsClosed()
{
  try
    {
      if (window.opener.closed == true)
         {self.close();}
      else
         {
           var strNovo = "";
           strNovo = window.opener.location.href;
           if (strNovo != strParentWindowURL)
              {
              //User might exit the site And moved to new one.
               self.close(); 
              } 
         }
     }
   catch (e)
    {
      /// "User exit site. might moved to new window.
      self.close()
    }
}

function post_prints()
{
	var display = add_deviceprint();
	if (display != null && document.forms[0].pm_sp != null)
		document.forms[0].pm_sp.value = display;
/*
	var display = fingerprint_display();
	if (display != null && document.forms[0].pm_sp != null)
		document.forms[0].pm_sp.value = display;
	
	var browser = fingerprint_browser();
	if (browser != null && document.forms[0].pm_bp != null)
		document.forms[0].pm_bp.value = browser;
	
	var software = fingerprint_software();	
	if (software != null && document.forms[0].pm_swp != null)
		document.forms[0].pm_swp.value = software;
*/
	return true;
}
