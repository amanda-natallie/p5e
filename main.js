function openAjax(){
	var ajax;

try{
	ajax = new XMLHttpRequest();
}catch(erro){
	try{
		ajax = new ActiveXObject("Msxl2.XMLHTTP");
	}catch(ee){
		try{
			ajax = new ActiveXObject("Microsoft.XMLHTTP");
		}catch(e){
			ajax = false;
		}
	}
}
return ajax;
}//instancia dinamicamente o objecto xmlhttp

function isDate(dataNasc)
{
    var currVal = dataNasc;
    if(currVal == '')
        return false;
    
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; //Regex
    var dtArray = currVal.match(rxDatePattern); //verifica se o formato tá ok
    
    if (dtArray == null) 
        return false;
    
    //formato de data dd/mm/aaaa.
    
    dtDia= dtArray[1];
    dtMes = dtArray[3];
    dtAno = dtArray[5];        
    
    if (dtMes < 1 || dtMes > 12) 
        return false;
    else if (dtDia < 1 || dtDia> 31) 
        return false;
    else if ((dtMes==4 || dtMes==6 || dtMes==9 || dtMes==11) && dtDia ==31) 
        return false;
    else if (dtMes == 2) 
    {
        var isleap = (dtAno % 4 == 0 && (dtAno % 100 != 0 || dtAno % 400 == 0));
        if (dtDia> 29 || (dtDia ==29 && !isleap)) 
                return false;
    }
    return true;
}

function verificarCPF(c){
        
        if(c == '111.111.111-11' || c == '222.222.222-22' || c == '333.333.333-33' || c == '444.444.444-4' || c == '555.555.555-55' || c == '666.666.666-66' || c == '777.777.777-77' || c == '888.888.888-88' || c == '999.999.999-99' || c == '000.000.000-00')
        {
            return 0;
        }else{
        var i;
        c = c.replace(".","");
        c = c.replace(".","");
        c = c.replace("-","");
        
        var s = c;
        var c = s.substr(0,9);
        var dv = s.substr(9,2);
        var d1 = 0;
        var v = false;

        for (i = 0; i < 9; i++){
            d1 += c.charAt(i)*(10-i);
        }
        if (d1 == 0){
            
            v = true;
            return 0;
        }
        d1 = 11 - (d1 % 11);
        if (d1 > 9) d1 = 0;
        if (dv.charAt(0) != d1){
            
            v = true;
            return 0;
        }

        d1 *= 2;
        for (i = 0; i < 9; i++){
            d1 += c.charAt(i)*(11-i);
        }
        d1 = 11 - (d1 % 11);
        if (d1 > 9) d1 = 0;
        if (dv.charAt(1) != d1){
            
            v = true;
            return 0;
        }
        if (!v) {
           return 1;
        }
    }
    }

function enviarContato(){

	if(document.getElementById){
            
            var nome = $('#nome').val();
            var email = $('#email').val();
            var telefone = $('#telefone').val();
            var assunto = $('#assunto').val();
            var erro = 0;
            var txt = email;
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
            
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    $('#mes-aviso2').show();
                    $('#email').focus();
                    erro++;
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }          
            
            if(telefone == ""){
                $("#telefone").css("border", "1px solid #f00");
                erro++;
                $('#telefone').focus();
            }else{
                $("#telefone").css("border", "1px solid #ccc");
            }            
            
            if(assunto == ""){
                $("#assunto").css("border", "1px solid #f00");
                erro++;
                $('#assunto').focus();
            }else{
                $("#assunto").css("border", "1px solid #ccc");
            }
                    
            
            
            if(erro == 0)
            {
                $('.alert-info').show();
                
                
                var ajax = openAjax();
                        
			ajax.open("GET", "funcoes.php?acao=contato&email=" + email + "&nome=" + nome + "&telefone=" + telefone + "&assunto=" + assunto, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                                           
                                                $('.alert-info').hide("slow");
                                                $('.alert-success').show();
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
        
function enviaNews(){

	if(document.getElementById){
            
            var email = document.getElementById('email_news').value;
            var nome = document.getElementById('nome_news').value;
            
            
            if(email == "" || nome == "")
            {
                document.getElementById('validacao2').style.display="block";
            }else
            {
                document.getElementById('validacao2').style.display="none";
                document.getElementById('loading2').style.display="block";
                
                var ajax = openAjax();
                        
			ajax.open("GET", "funcoes.php?acao=newsletter&email=" + email + "&nome=" + nome, true);
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 1){
					
				}
				
				if(ajax.readyState == 4){
                                   
					if(ajax.status == 200){
						var resultado = ajax.responseText;
						resultado = resultado.replace(/\+/g, " ");				
						resultado = unescape(resultado);
                                                
                                                document.getElementById('email_news').value = '';
                                                document.getElementById('nome_news').value = '';
                                                document.getElementById('loading2').style.display="none";
                                                document.getElementById('sucesso2').style.display="block";
                                                                
						
					}else{
						alert ('<p>Ouve algum erro na requisição</p>');
						
					}
				}
			}
			ajax.send(null);
		
            }
       
               
            
	}
        }
        
function voltar(step){

	if(document.getElementById){
           
            if(step == 1){
                $('.step2').hide("slow");
                $('.step1').show("slow");
                
            }
            
            if(step == 2){
                $('.step3').hide("slow");
                $('.step2').show("slow");
              
            }
            
            if(step == 3){
                $('.step4').hide("slow");
                $('.step3').show("slow");
                
            }
            
            if(step == 4){
                $('.step5').hide("slow");
                $('.step4').show("slow");
               
            }
            
            if(step == 5){
                $('.step6').hide("slow");
                $('.step5').show("slow");
                
            }
            
	}
  }        
        
function orcamento1(){

	if(document.getElementById){
           
            var nome = $('#nome').val();
            var cpfcnpj = $('#cpfcnpj').val();
            var contato = $('#contato').val();            
            var telefone = $('#telefone').val();
            var celular = $('#celular').val();            
            var email = $('#email').val();            
            var erro = 0;
            var txt = email;
            
            
            if(nome == ""){
                $("#nome").css("border", "1px solid #f00");
                erro++;
                $('#nome').focus();
            }else{
                $("#nome").css("border", "1px solid #ccc");
            }
            
            if(cpfcnpj == ""){
                $("#cpfcnpj").css("border", "1px solid #f00");
                erro++;
                $('#cpfcnpj').focus();
            }else{
                $("#cpfcnpj").css("border", "1px solid #ccc");
            }
            
            
            if(email == ""){
                $("#email").css("border", "1px solid #f00");
                erro++;
                $('#email').focus();
            }else{
                if ((txt.length != 0) && ((txt.indexOf("@") < 1) || (txt.indexOf('.') < 7)))
                {
                    erro++;
                    $('#mes-aviso2').show();
                    $('#email').focus();
                }else{
                    $('#mes-aviso2').hide("slow");
                }                
                $("#email").css("border", "1px solid #ccc");
            }
                        
            
            if(erro == 0)
            {
                $('.orc-aviso1').hide("slow");
                $('.mes-aviso2').hide("slow");
                $('.step1').hide("slow");
                $('.step2').show("slow");
                
		
            }else{
                $('.orc-aviso1').show();
            }
       
               
            
	}
        }
   
function orcamento2(){

	if(document.getElementById){
           
            var quantidade = $('#quantidade').val();
            var erro = 0;
            
            
            if(quantidade <= 0){
                $("#quantidade").css("border", "1px solid #f00");
                erro++;
                $('#quantidade').focus();
            }else{
                $("#quantidade").css("border", "1px solid #ccc");
            }
            
            
            if(erro == 0)
            {
                $('.orc-aviso2').hide("slow");
                $('.step2').hide("slow");
                $('.step3').show("slow");
                
		
            }else{
                $('.orc-aviso2').show();
            }
       
               
            
	}
  }
  
  function orcamento3(){

	if(document.getElementById){
           
            var servico = $("input[name='servico']:checked").val(); 
            
            var erro = 0;
            
            if(servico == undefined){
                $('.orc-aviso3').show();
                erro++;
            }else{
                $('.orc-aviso3').hide("slow");
                $('.step3').hide("slow");
                $('.step4').show("slow");
            }
                
               
            
	}
  }
       
 function orcamento4(){

	if(document.getElementById){          
            var regime = $("input[name='regime']:checked").val(); 
            var erro = 0;
           
            if(regime == undefined){
                $('.orc-aviso4').show();
            }else{
                
                $('.orc-aviso4').hide("slow");
                $('.step4').hide("slow");
                $('.step5').show("slow");
            }
                
               
            
	}
  }
        
   function orcamento5(){

	if(document.getElementById){       
            var nota = $("input[name='nota']:checked").val(); 
            
            var erro = 0;
           
            if(nota == undefined){
                $('.orc-aviso5').show();
            }else{
                
                var nome = $('#nome').val();
                var cpfcnpj = $('#cpfcnpj').val();
                var contato = $('#contato').val();            
                var telefone = $('#telefone').val();
                var celular = $('#celular').val();            
                var email = $('#email').val();       
                var quantidade = $('#quantidade').val();
                var servico = $("input[name='servico']:checked").val(); 
                var regime = $("input[name='regime']:checked").val(); 
                var nota = $("input[name='nota']:checked").val(); 
                
                var ajax = openAjax();
                        
                ajax.open("GET", "funcoes.php?acao=orcamento&email=" + email + "&nome=" + nome + "&cpfcnpj=" + cpfcnpj + "&contato=" + contato + "&telefone=" + telefone + "&celular=" + celular + "&quantidade=" + quantidade + "&servico=" + servico + "&regime=" + regime + "&nota=" + nota, true);
                ajax.onreadystatechange = function(){
                        if(ajax.readyState == 1){

                        }

                        if(ajax.readyState == 4){
                              
                                if(ajax.status == 200){
                                        var resultado = ajax.responseText;
                                        resultado = resultado.replace(/\+/g, " ");				
                                        resultado = unescape(resultado);
                                        
                                        $('.orc-aviso5').hide("slow");
                                        document.getElementById('step6').innerHTML = resultado;
                                        $('.step5').hide("slow");
                                        $('.step6').show("slow");


                                }else{
                                        alert ('<p>Ouve algum erro na requisição</p>');

                                }
                        }
                }
                ajax.send(null);
                
                
            }
                
               
            
	}
  }      