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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body style="margin:0 ">
        <div class="container-fluid">
            <div class="row-fluid">
                 
                <div class="col-md-6 col-xs-12">
                    <a href="<?php echo $base; ?>" class="stroke-red-button hvr-float-shadow" style="margin-bottom:0; margin-left: 30px"> <i class="fa fa-foward"></i> Voltar para o site</a>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 pcaptura">
                                <h3><?= strip_tags($texto[53]);?></h3>
                                <?= $texto[54];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="banner_captura" style="background: url(<?= $imagem[20] ?>)">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 pcaptura">
                                    <form >
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                                        </div>
                                        <div class="form-group">
                                                <span id="mes-aviso2" style=" width: 100%; font-size: 18px; float: left; display: none; color: #fff;">Insira um email válido!</span>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto">
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <div class="alert alert-success" style=" display: none; width: 100%; float: left; max-width: 600px !important">
                                                <strong>Sucesso!</strong> Sua mensagem foi enviada.
                                            </div>
                                            <div class="alert alert-info" style="text-align: center !important;  background: #990000; display: none; width: 100%; float: left; max-width: 600px !important">
                                                <img src="ajax-loader.gif" style="margin: 0 auto; " class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <button type="button" class="stroke-red-button hvr-float-shadow bt-captura" onclick="enviarContato()">SOLICITAR CONSULTA</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
        </div>
        <script src="main.js"></script>
        <script src="app-adm/js/jquery.filter_input.js"></script>
        <script src="app-adm/js/jquery.mask.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#email').filter_input({regex:'[a-zA-Z0-9-@._-]'});                
                $('#nome').filter_input({regex:'[a-zA-Z-çãáàâäêéèëîíìïõôóòöûúùü\\s]'});
                
            });
        </script>
        <script>

            $("#telefone").keydown(function(){
                $("#telefone").mask("(99) 9999-9999");
            });

         </script>  
    </body>
</html>




