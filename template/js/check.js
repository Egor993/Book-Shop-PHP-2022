"use strict";

function check() {
 let check=document.getElementsByTagName('input');
 for(let i=0;i<check.length;i++)
 {
  if(check[i].type=='checkbox')
  {
   check[i].checked=true;
  }
 }
}

function uncheck() {
 let uncheck=document.getElementsByTagName('input');
 for(let i=0;i<uncheck.length;i++)
 {
  if(uncheck[i].type=='checkbox')
  {
   uncheck[i].checked=false;
  }
 }
}