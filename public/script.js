
    var submit = document.getElementById("submit");
    var inputs = document.querySelectorAll("[id*=input]");
  
    function validaFunc(){
  
      var l = new ClassValidaLogin;
      
      if(l.valida() == false){
        return false
      }else{
        return true;
      }
    }
  
    class VerificaInputVazios{
  
      validaInputsVazios(inputs, boxAlerta){
      var resultado;
      var inputsArray = Array.from(inputs);
      inputsArray.forEach((input, index)=> {
          if(input.value === ""){
          inputsArray[index].style.borderColor = "red";
          boxAlerta.style.display = "block";
          boxAlerta.children[0].innerText = "Alguns campos estão vazios :(";
          resultado = false;
          
      }else{
          inputsArray[index].style.borderColor = "black";
          boxAlerta.style.display = "none";
          resultado = true;	
        }
      })
      return resultado;
    }
  }
    class ClassValidaLogin extends VerificaInputVazios{
  
      valida(){
        var inputs = document.querySelectorAll("[id*='input']");
        var boxAlerta = document.getElementById("alerta_campo_vazio");
        var res = this.validaInputsVazios(inputs, boxAlerta);
        return res;
      }
    }
  
