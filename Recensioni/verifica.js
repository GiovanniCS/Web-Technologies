function star_accendi(n) {
   for (i=1; i<=5 ; i++) {
      if(i<=n)
          document.getElementById('stelle_' + i).className = 'on';
      else
          document.getElementById('stelle_' + i).className = '';
   }
   document.getElementById('nascosto').value = n;
}

function s_accendi() {
   var k =  document.getElementById('nascosto').value;
   var reg =/^\D$/;
   if(!k || reg.test(k)){
      k = 0;
      document.getElementById('nascosto').value = 0;
   }
   else if(k>5){
      k = 5;
      document.getElementById('nascosto').value = 5;
   }

   for (i=1; i<=5; i++) {
     if(i>k || k==0)
         document.getElementById('stelle_' + i).className = '';
     else
         document.getElementById('stelle_' + i).className = 'on';
   }
}

function checkNome() {
   var xnome=document.getElementById("nome").value;
   var regnome=/^[a-zA-Z]*$/;
   if(xnome==""){
      document.getElementById("enome").innerHTML="Inserisci il nome";
      return false;
   }
   if(!(regnome.test(xnome))){
      document.getElementById("enome").innerHTML="Solo caratteri permessi";
      return false;
     }
   else{ 
      document.getElementById("enome").innerHTML="";
      return true;
   }
}
function checkCommento(){
   var xcommento=document.getElementById("commento").value;
   if(xcommento==""){
      document.getElementById("ecommento").innerHTML="Inserisci un messaggio";
      return false;
   }
   if(xcommento.length>256){
      document.getElementById("ecommento").innerHTML="Limite caratteri superato";
      return false;
   }
   else{
      document.getElementById("ecommento").innerHTML="";
      return true;
   }
}

function countChars(countfrom,displayto) {
  var len = document.getElementById(countfrom).value.length;
  document.getElementById(displayto).innerHTML = 256-len;
}

function check()
{
    
    return (checkNome()&&checkCommento());
}
