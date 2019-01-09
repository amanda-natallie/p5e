<?php require("funcoes.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $site_title; ?></title>        
        <meta name="description" content="<?php echo $site_description_face; ?>">      
        <meta name="keywords" content="<?php echo $site_keywords; ?>">      
        <meta name="robot" content="all">      
        <meta name="rating" content="general">  
        <meta name="language" content="pt-br">     
        <meta property="og:title" content="<?php echo $site_title_face; ?>"> 
        <meta property="og:url" content="<?php echo $site_url_face; ?>">     
        <meta property="og:image" content="<?php echo $site_imagem; ?>">        
        <meta property="og:site_name" content="<?php echo $nome_Email; ?>">       
        <meta property="og:description" content="<?php echo $site_description_face; ?>"> 
        <base href="<?php echo $base; ?>" />
        <link href="<?php echo $imagem[3] ?>" rel="icon" type="image/png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.7/paper/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/hover-min.css">
        <link rel="stylesheet" href="assets/plugins/remodal/remodal-default-theme.css">
        <link rel="stylesheet" href="assets/plugins/remodal/remodal.css">
        <script src="assets/js/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <script src="assets/plugins/remodal/remodal.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/scrolling-nav.js"></script>
        <style>
                .hidden { display: none !important; }
                .erro {  }
        </style>

    </head>

    <body>

        <div class="banner_login" style=" background: url(<?= $imagem[23] ?>)">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center login-page">
                        <h4><?= strip_tags($texto[55]);?></h4>
                        <h5><?= strip_tags($texto[56]);?></h5>
                    </div>
                </div>
            </div>
            <div class="container fotms">
                <div class="row">
                    <div class="col-md-4" style=" margin-bottom: 30px !important">
                        <h6><?= strip_tags($texto[58]);?></h6>
                        <form>
                            <input type="hidden" name="cnpjBureau" id="cnpjBureau" value="07945092000121" />
                            <div class="form-group" style=" float: left; margin-bottom: 10px; width: 100%;">
                                <input type="text" class="form-control" id="cpfCnpj" name="cpfCnpj" placeholder="CPF/CNPJ" style=" padding-left: 10px; border-radius: 10px">
                            </div>
                            <div class="form-group" >
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" style=" padding-left: 10px; border-radius: 10px">
                            </div>
                            <div class=" clearfix"></div>
                            <div class="form-group" style=" margin-top: 10px" >
                                <div id="erro" class="alert alert-warning erro hidden" >
                                    Usuário ou senha inválidos.
                                </div>
                                <div class="alert alert-warning mes-aviso"  style=" display: none">
                                    Preencha todos os campos.
                                </div>
                            </div>
                            <button type="button" class="stroke-red-button hvr-float-shadow" name="logar" id="logar" style=" border: 0; padding: 10px; width: 100%; margin-top: -7px; text-align: center">Entrar</button>
                        </form>                        
                    </div>
                    <div class="col-md-4" style="margin-bottom: 30px !important">
                        <h6><?= strip_tags($texto[57]);?></h6>
                            <a href="https://app.contaazul.com/auth/" class="stroke-red-button hvr-float-shadow" name="logar" id="logar" style=" border: 0; padding: 10px; width: 100%; text-align: center">Fazer Login</a>
                    </div>
                    <div class="col-md-4" style=" margin-bottom: 30px !important">
                        <h6><?= strip_tags($texto[59]);?></h6>
                        <a href="https://nfstock.alterdata.com.br/" class="stroke-red-button hvr-float-shadow" name="logar" id="logar" style=" border: 0; padding: 10px; width: 100%; text-align: center">Fazer Login</a>
                    </div>
                    <div class="col-md-12" style=" margin-bottom: 30px; text-align: center">
                    <a href="<?php echo $base; ?>" class="stroke-red-button hvr-float-shadow" style="margin-bottom:0"> <i class="fa fa-foward"></i> Voltar para o site</a>
                    </div>
                </div>

            </div>
            <div class="container box-videos">
                <div class="row">
                    <?php
                    $sql = 'SELECT * FROM tbl_videos ORDER BY id ASC';         
                    try{

                        $read = $db->prepare($sql);
                        $read->execute();

                    } catch (PDOException $ex) {
                        echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
                    }

                    while($rs = $read->fetch(PDO::FETCH_OBJ))
                    { ?>
                    <div class="col-md-4">
                        <a href="login.php#modal<?= $rs->id; ?>" class=" relative video hvr-float-shadow" style="background: url(<?= $rs->imagem; ?>) top center no-repeat; background-size: 100%">
                            <span><?= $rs->titulo; ?></span> 
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

        </div>
        <?php
        $sql = 'SELECT * FROM tbl_videos ORDER BY id ASC';         
        try{

            $read = $db->prepare($sql);
            $read->execute();

        } catch (PDOException $ex) {
            echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
        }

        while($rs = $read->fetch(PDO::FETCH_OBJ))
        { ?>
        <div class="remodal" data-remodal-id="modal<?= $rs->id; ?>" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
            <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
            <div>
                <h2 id="modal1Title"><?= $rs->titulo; ?></h2>
               <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $rs->video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <br>
            <button data-remodal-action="cancel" class="remodal-cancel">Cancelar</button>
            <button data-remodal-action="confirm" class="remodal-confirm">OK</button>
        </div>
        <?php } ?>
        
        <input id="cnpjBureau" name="cnpjBureau" type="hidden" value="10620061000105" /><input id="cpfCnpj" name="cpfCnpj" type="hidden" value="<%=RSlogin("packup_usuario")%>" /><input id="senha" name="senha" type="hidden" value="<%=RSlogin("packup_senha")%>" /><div class="center"><button id="logar" class="bt-padrao">Acessar o Sistema PackUp</button></div><label id="erro" class="erro hidden"></label><script type="text/javascript">function logar(e,t,n){var a=new XMLHttpRequest;a.open("POST","https://packup.alterdata.com.br/api/Cliente/ObterTicket",!0),a.setRequestHeader("Content-type","application/x-www-form-urlencoded"),a.onreadystatechange=function(){if(4===a.readyState&&200===a.status){var e=JSON.parse(a.response);""===e.URL?document.getElementById("erro").setAttribute("class","erro"):location.assign(e.URL)}},a.send("CnpjBureau="+e+"&CpfCnpj="+t+"&Senha="+n)}document.getElementById("logar").onclick=function(){document.getElementById("erro").setAttribute("class","erro hidden"),document.getElementById("cpfCnpj").value=document.getElementById("cpfCnpj").value.replace(/(\-|\.|\/|\ )/g,""),logar(document.getElementById("cnpjBureau").value,document.getElementById("cpfCnpj").value,document.getElementById("senha").value)};</script>
        
        <script type="text/javascript">
        function logar(e,t,n){
            var a=new XMLHttpRequest;a.open("POST","https://packup.alterdata.com.br/api/Cliente/ObterTicket",!0),
            a.setRequestHeader("Content-type","application/x-www-form-urlencoded"),
            a.onreadystatechange=function(){
                if(4===a.readyState&&200===a.status){ 
                    var e=JSON.parse(a.response);
                    
                    ""===e.URL?document.getElementById("erro").setAttribute("class","erro alert alert-warning"):location.assign(e.URL); 
                }
            },a.send("CnpjBureau="+e+"&CpfCnpj="+t+"&Senha="+n)
                    
        }
        document.getElementById("logar").onclick=function(){
            
            var cpfCnpj = $('#cpfCnpj').val();
            var senha = $('#senha').val();

            if(cpfCnpj == "" || senha == ""){
                $('.mes-aviso').show();
            }else{
                $('.mes-aviso').hide("slow");
                document.getElementById("erro").setAttribute("class","erro hidden"),
                document.getElementById("cpfCnpj").value=document.getElementById("cpfCnpj").value.replace(/(\-|\.|\/|\ )/g,""),
                logar(document.getElementById("cnpjBureau").value,document.getElementById("cpfCnpj").value,document.getElementById("senha").value);
            }
        };
        </script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="app-adm/js/jquery.mask.min.js"></script>

        <script>
            var CpfCnpjMaskBehavior = function (val) {
                            return val.replace(/\D/g, '').length <= 11 ? '000.000.000-009' : '00.000.000/0000-00';
                        },
            cpfCnpjpOptions = {
                onKeyPress: function(val, e, field, options) {
                field.mask(CpfCnpjMaskBehavior.apply({}, arguments), options);
              }
            };

        $(function() {
                $(':input[name=cpfCnpj]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
        })


     </script>
    </body>
</html>

