 function SelectAll()
{
 var Select=document.getElementById("select");
 var Chk=document.getElementsByTagName("input");
 if(Select.checked===true)
 {
  for(i=0;i<Chk.length;i++)
   if(Chk[i].type=="checkbox" && Chk[i].id=="chk" && Chk[i].checked==false)
    Chk[i].checked=true;
 }
 else
  for(i=0;i<Chk.length;i++)
	Chk[i].checked=false;
} 
