

<div id="reg" class="container well">
    
    <form action="index.php?location=contacta" method="post" id="correos">
        <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="form-group">
        <label for="email">Correo</label><br>
        <input class="form-control" name="email" type="email" required><br>
        <p id="0"></p>
        </div>
        <br>
        
        <div class="form-group">
        <label for="email2">Repita Correo</label><br>
        <input class="form-control" name="email2" type="email" required><br>
        <p id="1"></p>
        </div>
        <br>
        </div>
        
        <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="form-group">
        <label for="subject">Asunto</label><br>
        <input class="form-control" name="subject" type="text" required><br>
          <p id="2"></p>
        </div>
          <br>
          
          <div class="form-group">
          <label for="mensaje">Mensaje:</label><br>
          <textarea class="form-control" name="mensaje" required></textarea><br>
         <p id="3"></p>
          </div>
         <br>
          </div>
        <div class="col-md-5 col-sm-5 col-xs-12">
         <input class="btn btn-primary" id="enviar" type="submit" name="enviar" value="Enviar">
        <input class="btn btn-warning" id="cancelar" type="submit" name="cancelar" value="Cancelar">
        </div>
        
        
    </form>
    
</div>    


<script>
    window.onload=function(){
        
        var enviar= document.getElementById("enviar");
        var cancelar= document.getElementById("cancelar");
        cancelar.addEventListener('click',salir);
        enviar.addEventListener('click',validar);
    };

    function validar(){
        
        var error=false;
        console.log("entramos a validar");
        var formulario= document.getElementById("correos");
        
        for(i=0;i<formulario.length-2;i++){
            console.log("entramos al for");
            document.getElementById(i).innerHTML = "";
            if(!formulario.elements[i].checkValidity()){
                console.log("Entramos al if");
                document.getElementById(i).innerHTML=formulario.elements[i].validationMessage.fontcolor("red");
                
                error=true;
            }
        }
        
        var email = formulario.elements[0].value;
        var email2 = formulario.elements[1].value;
        
        if(email!=""&&email2!=""){
            
            if(email!=email2){
                document.getElementById(0).innerHTML="Los correos no coinciden".fontcolor("red");
                document.getElementById(1).innerHTML="Los correos no coinciden".fontcolor("red");
                error=true;
            }
        }
        
        if(!error){
            formulario.submit();
        }
    }
    
    function salir(){
        
        window.location.href="index.php";
    }
</script>