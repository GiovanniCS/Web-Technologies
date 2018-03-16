function checkNome() {
    var xnome = document.forms["form"]["nome"].value;
    var regnome=/^[a-zA-Z]+$/;
    if(xnome==""){
        document.getElementById("enome").innerHTML="Inserisci il nome";
        return false;
    }
    else if(!(regnome.test(xnome))){
       document.getElementById("enome").innerHTML="Solo caratteri permessi";
       return false;
    }
    else{
        document.getElementById("enome").innerHTML="";
        return true;
    }
}
function checkCognome() {
    var xcognome = document.forms["form"]["cognome"].value;
    var regcog=/^[a-zA-Z]+$/;
    if(xcognome==""){
        document.getElementById("ecognome").innerHTML="Inserisci il cognome";
        return false;
    }
    else if(!regcog.test(xcognome)){
       document.getElementById("ecognome").innerHTML="Solo caratteri permessi"; 
       return false;
    }
    else{
        document.getElementById("ecognome").innerHTML="";
        return true;
    }
}

function checkEmail() {
    var xemail = document.forms["form"]["email"].value;
    var email_reg_exp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,})$/;
    if(xemail==""){
        document.getElementById("eemail").innerHTML="Inserisci la mail";
        return false;
    }
    else if(!email_reg_exp.test(xemail)){
        document.getElementById("eemail").innerHTML="Formato email scorretta";
        return false;
    }
    else{
        document.getElementById("eemail").innerHTML="";
        return true;
    }
}

function checkPhone() {
    var xtelefono = document.forms["form"]["telefono"].value;
    var tele_exp_reg= /^(\+[0-9]{2}\s?)?[0-9]{10}$/;
    if(xtelefono==""){
        document.getElementById("etelefono").innerHTML="Inserisci il numero di telefono";
        return false;
    }
    else if(!tele_exp_reg.test(xtelefono)){
        document.getElementById("etelefono").innerHTML="Formato numero scorretto"; 
        return false;
    }
    else{
        document.getElementById("etelefono").innerHTML="";
        return true;
    }
}

function checkMessage() {
    var xmessaggio = document.forms["form"]["messaggio"].value;
    if(xmessaggio==""){
        document.getElementById("emessaggio").innerHTML="Inserisci un messaggio";
        return false;
    }
    if(xmessaggio.length>512){
        document.getElementById("emessaggio").innerHTML="Limite caratteri superato";
        return false;
    }
    else { document.getElementById("emessaggio").innerHTML="";
        return true;
    }
}

function controllaTutto() {
    if(!(checkNome() & checkCognome() & checkEmail() & checkPhone() & checkMessage()))
        return false;
}
function countChars(countfrom,displayto) {
  var len = document.getElementById(countfrom).value.length;
  document.getElementById(displayto).innerHTML = 512-len;
}