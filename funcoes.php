<?php session_start(); 

if (isset($_GET['pag'])) {
    $pag = $_GET['pag'];
} else {
    $pag = 1;
} 

    if(isset($_GET['acao'])){
        
        require 'phpmailer/PHPMailerAutoload.php';
        $acao = $_GET['acao']; 

        if($acao == "newsletter")
        {
           $email = $_GET['email'];
           $nome = $_GET['nome'];

            $sql = 'SELECT * FROM tbl_newsletter WHERE email = :email';   

            try{

                $read = $db->prepare($sql);
                $read->bindParam(':email', $email, PDO::PARAM_STR);
                $read->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }
            $todos = 0;
            while($rs = $read->fetch(PDO::FETCH_OBJ))
            {
                $todos++;
            }

            if($todos == 0){
            $nome = $_GET['nome'];
            $email = $_GET['email'];
            $sql = 'INSERT INTO tbl_newsletter (nome, email)';
            $sql .= ' VALUES (:nome, :email)';

            try{

                $create = $db->prepare($sql);
                $create->bindValue(':nome', $nome, PDO::PARAM_STR);
                $create->bindValue(':email', $email, PDO::PARAM_STR);
                if($create->execute() ){

                }


            } catch (PDOException $e) {
                    echo "Erro ao Cadastrar Registro! - " . $e->getMessage();
            }

         }
        }
        
        if($acao == "orcamento")
        {           
            $email = $_GET['email'];
            $nome = $_GET['nome'];
            $cpfcnpj = $_GET['cpfcnpj'];
            $contato = $_GET['contato'];
            $telefone = $_GET['telefone'];
            $celular = $_GET['celular'];
            $quantidade = $_GET['quantidade'];
            $servico = $_GET['servico'];
            $regime = $_GET['regime'];
            $nota = $_GET['nota'];
            
            switch ($servico){
                case 1: $nome_servico = 'Serviço'; break;
                case 2: $nome_servico = 'Comércio'; break;
                case 3: $nome_servico = 'Indústria e Comércio'; break;
                case 4: $nome_servico = 'Indústria/Comércio/Serviço'; break;
                default: $nome_servico = 'Serviço'; break;
            }
            
            switch ($regime){
                case 1: $nome_regime = 'Simples Nacional'; break;
                case 2: $nome_regime = 'Lucro Real'; break;
                case 3: $nome_regime = 'Lucro Presumido'; break;
                default: $nome_regime = 'Simples Nacional'; break;
            }
            
            switch ($nota){
                case 1: $nome_nota = 'Até 100'; break;
                case 2: $nome_nota = 'Até 500'; break;
                case 3: $nome_nota = 'Até 1000'; break;
                case 4: $nome_nota = 'Até 2000'; break;
                case 5: $nome_nota = 'Até 3000'; break;
                case 6: $nome_nota = 'Até 5000'; break;
                default: $nome_nota = 'Até 100'; break;
            }
            
            $valor_funcionario = 0;
            $valor_base = 35;
            if($quantidade <= 10){ $valor_funcionario = $valor_base * $quantidade; }
            if($quantidade > 10 && $quantidade <= 30){ $valor_funcionario = ($valor_base - ($valor_base * 0.1))*$quantidade; }
            if($quantidade > 30 && $quantidade <= 50){ $valor_funcionario = ($valor_base - ($valor_base * 0.3))*$quantidade; }
            if($quantidade > 50){ $valor_funcionario = ($valor_base - ($valor_base * 0.4))*$quantidade; }
            
            $valor_orc = 0;
            
            if($regime == 1){
                switch ($nota){
                    case 1: $valor_orc = 400; break;
                    case 2: $valor_orc = 450; break;
                    case 3: $valor_orc = 495; break;
                    case 4: $valor_orc = 544.5; break;
                    case 5: $valor_orc = 598.95; break;
                    case 6: $valor_orc = 658.85; break;
                    default : $valor_orc = 400; break;
                    
                }
            }
            
            if($regime == 2){
                switch ($nota){
                    case 1: $valor_orc = 700; break;
                    case 2: $valor_orc = 770; break;
                    case 3: $valor_orc = 847; break;
                    case 4: $valor_orc = 931.7; break;
                    case 5: $valor_orc = 1024.87; break;
                    case 6: $valor_orc = 1127.36; break;
                    default : $valor_orc = 700; break;
                    
                }
            }
            
            if($regime == 3){
                switch ($nota){
                    case 1: $valor_orc = 1500; break;
                    case 2: $valor_orc = 1800; break;
                    case 3: $valor_orc = 2160; break;
                    case 4: $valor_orc = 2592; break;
                    case 5: $valor_orc = 3110.40; break;
                    case 6: $valor_orc = 3732.48; break;
                    default : $valor_orc = 1500; break;
                    
                }
            }
            
            
            $resultado = '<div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2>Valor total</h2>
                                <p>O valor total estimado é de :</p>
                                <h2>R$'. number_format($valor_orc + $valor_funcionario, 2, ',', '.').'</h2>
                                <h3>Resumo</h3>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 campo-orcamento">
                                <table class="table tbl-orcamento">
                                    <thead>
                                        <th>Descrição</th>
                                        <th class="lfb_valueTh">Informação</th>
                                        <th class="lfb_quantityTh ">Quantidade</th>
                                        <th class="lfb_priceTh ">Preço</th>
                                    </thead>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Dados da empresa</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Razão Social ou Nome Fantasia da empresa</td>
                                        <td >'.$nome.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >CNPJ/CPF</td>
                                        <td >'.$cpfcnpj.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Pessoa para contato</td>
                                        <td >'.$contato.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Telefone principal</td>
                                        <td >'.$telefone.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Celular</td>
                                        <td >'.$celular.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Email</td>
                                        <td >'.$email.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Quantidade de Funcionários</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Quantidade</td>
                                        <td ></td>
                                        <td >'.$quantidade.'</td>
                                        <td >R$'. number_format($valor_funcionario, 2, ',', '.').'</td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Segmento</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_servico.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Regime Tributário</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_regime.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Quantidade de Notas Fiscais</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_nota.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td >R$'. number_format($valor_orc, 2, ',', '.').'</td>
                                    </tr>
                                    <tbody>
                                    <tr  class="tbl_registro">
                                        <td colspan="3">Total :</td>
                                        <td id="lfb_summaryTotal">R$'. number_format($valor_orc + $valor_funcionario, 2, ',', '.').'<span></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>';
            echo $resultado;
            
            
            
            $conteudo = '<html>
                             <head>
                                 <meta charset="UTF-8">
                                 <style>
                                 .cab-orcamento{ text-align: center !important; margin-bottom: 50px; padding-top: 50px}
                                .cab-orcamento h2{ font-weight: bold;}
                                .cab-orcamento p{ font-size: 20px}
                                .campo-orcamento{ }
                                .campo-orcamento span{ text-align: center; font-size: 18px; }
                                .campo-orcamento .cmp-orc{ text-align: center; font-size: 18px; float: left; width: 100%; margin-top: 10px; border: 2px solid #CCC; border-radius: 5px; height: 50px }
                                .bt-orcamento{ border: 0; border-radius: 5px}                               
                                .tbl-orcamento thead{ background: #383838; color: #FFF; width: 90%; float: left;}
                                .tbl-orcamento .tbl_subtitulo{ background: #880000; color: #FFF; text-align: center; font-weight: bold}
                                .tbl-orcamento .tbl_registro{ background: #FFF !important; border: 1px solid #CCC}
                                .tbl-orcamento .tbl_registro td{ background: #FFF !important; border: 1px solid #CCC}
                                </style>
                             </head>
                            <body style=" border: 0; margin: 0; background: #ECF0F1">
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento" style="padding-bottom: 50px !important">
                                <h2>Valor total</h2>
                                <p>O valor total estimado é de :</p>
                                <h2>R$'. number_format($valor_orc + $valor_funcionario, 2, ',', '.').'</h2>
                                <h3>Resumo</h3>
                                <table class="table tbl-orcamento" style=" width: 80%; margin-left: 10%; margin-top: -50px !important">
                                    <tr class="tbl_subtitulo" style="background: #383838; color: #FFF;">
                                        <th>Descrição</th>
                                        <th class="lfb_valueTh">Informação</th>
                                        <th class="lfb_quantityTh ">Quantidade</th>
                                        <th class="lfb_priceTh ">Preço</th>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Dados da empresa</td>
                                    </tr>
                                    
                                    <tr class="tbl_registro">
                                        <td >Razão Social ou Nome Fantasia da empresa</td>
                                        <td >'.$nome.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >CNPJ/CPF</td>
                                        <td >'.$cpfcnpj.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Pessoa para contato</td>
                                        <td >'.$contato.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Telefone principal</td>
                                        <td >'.$telefone.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Celular</td>
                                        <td >'.$celular.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Email</td>
                                        <td >'.$email.'</td>
                                        <td ></td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Quantidade de Funcionários</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >Quantidade</td>
                                        <td ></td>
                                        <td >'.$quantidade.'</td>
                                        <td >R$'. number_format($valor_funcionario, 2, ',', '.').'</td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Segmento</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_servico.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Regime Tributário</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_regime.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td ></td>
                                    </tr>
                                    <tr class="tbl_subtitulo">
                                        <td colspan="4">Quantidade de Notas Fiscais</td>
                                    </tr>
                                    <tr class="tbl_registro">
                                        <td >'.$nome_nota.'</td>
                                        <td ></td>
                                        <td >1</td>
                                        <td >R$'. number_format($valor_orc, 2, ',', '.').'</td>
                                    </tr>
                                    <tbody>
                                    <tr  class="tbl_registro">
                                        <td colspan="3">Total :</td>
                                        <td id="lfb_summaryTotal">R$'. number_format($valor_orc + $valor_funcionario, 2, ',', '.').'<span></span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            

                            </body>
                            </html>';

        $mailer = new PHPMailer();
        $mailer->IsSMTP();
        $mailer->Port = $porta_email;
        $mailer->Host = $host_email;
        $mailer->SMTPAuth = true; 
        $mailer->SMTPSecure = 'ssl';
        $mailer->IsHTML(true);    
        $mailer->CharSet = 'UTF-8';
        $mailer->Username = $rem_email; 
        $mailer->Password = $pass_email; 
        $mailer->FromName = $nome_email; 
        $mailer->From = $rem_email; 
        $mailer->AddAddress('cleberson.groovin@gmail.com');
        $mailer->AddAddress($email);        
        $mailer->AddAddress('grupociatos@grupociatos.com.br');
        $mailer->Subject = "Solicitação de Orçamento - " . $nome;
        $mailer->Body = $conteudo;
        if(!$mailer->Send())
        {
            echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;

        } else {  }
            
         }
        if($acao == "contato")
        {
            
            $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC'; 
            try{ $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage(); }
            while($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->id; $nome_contato[$id] = $rs->tipo; $contato[$id] = $rs->texto; }

            $assunto = $_GET['assunto'];
            $telefone = $_GET['telefone'];
            $email = $_GET['email'];
            $nome = $_GET['nome'];
            
            $emaildestinatario = $contato[11];
            
            $conteudo = '<html>
                                                     <head>
                                                         <meta charset="UTF-8">
                                                     </head>
                                                    <body style=" border: 0; margin: 0;">
                                                    <table width="650" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #999999; background: #EEEEEE;">
                                                      <tr style=" height: 30px; background: '.$cor_email.'; color: #fff; font-size: 20px; font-family: verdana; text-align: center;  ">
                                                            <td>
                                                               Mensagem de Contato
                                                            </td>
                                                      </tr>
                                                      <tr>
                                                        <td>
                                                            <table width="90%" border="0" cellspacing="15" cellpadding="15" style=" background: #fff; margin-left: 5%; margin-top: 5%; margin-bottom: 5%;" >
                                                          <tr>
                                                            <td>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Nome:</strong> '.$nome.' </p>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Telefone:</strong> '.$telefone.' </p>
                                                              <p style="font-family: Tahoma; font-size: 14px; font-family: verdana;"><strong>Email:</strong> '.$email.' </p>
                                                           </td>
                                                          </tr>
                                                        </table></td>
                                                      </tr>
                                                    </table>

                                                    </body>
                                                    </html>';
                                
                                $mailer = new PHPMailer();
                                $mailer->IsSMTP();
                                $mailer->SMTPDebug = 2;
                                $mailer->Port = $porta_email;
                                $mailer->Host = $host_email;
                                $mailer->SMTPAuth = true; 
                                $mailer->SMTPSecure = 'ssl';
                                $mailer->IsHTML(true);    
                                $mailer->CharSet = 'UTF-8';
                                $mailer->Username = $rem_email; 
                                $mailer->Password = $pass_email; 
                                $mailer->FromName = $nome_email; 
                                $mailer->From = $rem_email; 
                                $mailer->AddAddress($emaildestinatario);
                                $mailer->Subject = "Mensagem de Contato - " . $assunto;
                                $mailer->Body = $conteudo;
                                if(!$mailer->Send())
                                {
                                    echo "<b>Informações do erro:</b> " . $mailer->ErrorInfo;
                                    
                                } else {  }

            
            
         }
         
        
    }else{
        /*
        $sql = 'SELECT * FROM tbl_imagens ORDER BY id DESC';
        try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$imagem[$id] = $rs->imagem;$imagem_alt[$id] = $rs->alt;$imagem_title[$id] = $rs->title;}        

        $sql = 'SELECT * FROM tbl_textos ORDER BY id DESC';try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$texto[$id] = $rs->texto;$nome[$id] = $rs->nome;}        

        $sql = 'SELECT * FROM tbl_contato ORDER BY id DESC';try {$read = $db->prepare($sql);$read->execute();} catch (PDOException $ex) {echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) {$id = $rs->id;$nome_contato[$id] = $rs->tipo;$contato[$id] = $rs->texto;}       

        $sql = 'SELECT * FROM tbl_seo ORDER BY id DESC';try { $read = $db->prepare($sql); $read->execute(); } catch (PDOException $ex) { echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();}
        while ($rs = $read->fetch(PDO::FETCH_OBJ)) { $id = $rs->pagina; $seo_title[$id] = $rs->titulo_site;$seo_keywords[$id] = $rs->keywords;$seo_description[$id] = $rs->description;$seo_titulo_face[$id] = $rs->titulo_face;$seo_url_face[$id] = $rs->url_face;$seo_description_face[$id] = $rs->description_face;}               

        
        $data_atual = date('Y-m-d');

        if($pag == 10)
        {
            $sql_post = 'SELECT * FROM tbl_galerias WHERE url = :url';   

            try{

                $read_post = $db->prepare($sql_post);
                $read_post->bindParam(':url', $_GET['url'], PDO::PARAM_STR);
                $read_post->execute();

            } catch (PDOException $ex) {
                echo 'Erro ao Buscar Dados! - ' . $ex->getMessage();
            }

            $rs_post = $read_post->fetch(PDO::FETCH_OBJ);

            $site_imagem = $base . $rs_post->capa;                        
            $site_title = $rs_post->nome;                     
            $site_keywords = $rs_post->keywords;                       
            $site_title_face = $rs_post->nome;                    
            $site_url_face = 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];                        
            $site_description_face = $rs_post->resumo;
            
        }else{

        switch ($pag){
            case 1: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[1]; $site_keywords = $seo_keywords[1]; $site_title_face = $seo_titulo_face[1]; $site_url_face = $seo_url_face[1]; $site_description_face = $seo_description_face[1]; break;}
            case 2: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[2]; $site_keywords = $seo_keywords[2]; $site_title_face = $seo_titulo_face[2]; $site_url_face = $seo_url_face[2]; $site_description_face = $seo_description_face[2]; break;}
            case 3: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[3]; $site_keywords = $seo_keywords[3]; $site_title_face = $seo_titulo_face[3]; $site_url_face = $seo_url_face[3]; $site_description_face = $seo_description_face[3]; break;}
            case 4: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[4]; $site_keywords = $seo_keywords[4]; $site_title_face = $seo_titulo_face[4]; $site_url_face = $seo_url_face[4]; $site_description_face = $seo_description_face[4]; break;}
            case 5: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[5]; $site_keywords = $seo_keywords[5]; $site_title_face = $seo_titulo_face[5]; $site_url_face = $seo_url_face[5]; $site_description_face = $seo_description_face[5]; break;}
            case 6: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[6]; $site_keywords = $seo_keywords[6]; $site_title_face = $seo_titulo_face[6]; $site_url_face = $seo_url_face[6]; $site_description_face = $seo_description_face[6]; break;}
            case 7: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[7]; $site_keywords = $seo_keywords[7]; $site_title_face = $seo_titulo_face[7]; $site_url_face = $seo_url_face[7]; $site_description_face = $seo_description_face[7]; break;}
            case 8: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[8]; $site_keywords = $seo_keywords[8]; $site_title_face = $seo_titulo_face[8]; $site_url_face = $seo_url_face[8]; $site_description_face = $seo_description_face[8]; break;}
            case 9: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[9]; $site_keywords = $seo_keywords[9]; $site_title_face = $seo_titulo_face[9]; $site_url_face = $seo_url_face[9]; $site_description_face = $seo_description_face[9]; break;}
            case 11: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[11]; $site_keywords = $seo_keywords[11]; $site_title_face = $seo_titulo_face[11]; $site_url_face = $seo_url_face[11]; $site_description_face = $seo_description_face[11]; break;}
            default: { $site_imagem = $base . $imagem[2]; $site_title = $seo_title[1]; $site_keywords = $seo_keywords[1]; $site_title_face = $seo_titulo_face[1]; $site_url_face = $seo_url_face[1]; $site_description_face = $seo_description_face[1]; break;}
            }            
        }
*/

        setlocale(LC_ALL, 'en_US.UTF8');
        function gerarUrl($str, $replace=array(), $delimiter='-') {
            if( !empty($replace) ) {
                $str = str_replace((array)$replace, ' ', $str);
            }

            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower(trim($clean, '-'));
            $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

            return $clean;
        }
        
        function limpaEnd($str, $replace=array(), $delimiter='+') {
            if( !empty($replace) ) {
                $str = str_replace((array)$replace, ' ', $str);
            }

            $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
            $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
            $clean = strtolower(trim($clean, '-'));
            $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

            return $clean;
        }

        function gerarData($data) {

            $data = explode('-',$data);

            switch ($data[1])
            {
                case 1: $mes = 'Janeiro'; break;
                case 2: $mes = 'Fevereiro'; break;
                case 3: $mes = 'Março'; break;
                case 4: $mes = 'Abril'; break;
                case 5: $mes = 'Maio'; break;
                case 6: $mes = 'Junho'; break;
                case 7: $mes = 'Julho'; break;
                case 8: $mes = 'Agosto'; break;
                case 9: $mes = 'Setembro'; break;
                case 10: $mes = 'Outubro'; break;
                case 11: $mes = 'Novembro'; break;
                case 12: $mes = 'Dezembro'; break;

            }

            $data2 = $data[2] . ' de ' . $mes . ' de ' . $data[0];

            return $data2;
        }

        $diasemana = array('Domingo', 'Segunda-feira', 'Terça-feira', 'Quarta-feira', 'Quinta-feira', 'Sexta-feira', 'Sábado');
        $dt = date('Y-m-d');
        $diasemana_numero = date('w', strtotime($dt));

        $data = date('Y-m-d');
        $data = explode("-", $data);

        switch ($data[1]) {
            case 1: $mes = 'Janeiro';
                break;
            case 2: $mes = 'Fevereiro';
                break;
            case 3: $mes = 'Março';
                break;
            case 4: $mes = 'Abril';
                break;
            case 5: $mes = 'Maio';
                break;
            case 6: $mes = 'Junho';
                break;
            case 7: $mes = 'Julho';
                break;
            case 8: $mes = 'Agosto';
                break;
            case 9: $mes = 'Setembro';
                break;
            case 10: $mes = 'Outubro';
                break;
            case 11: $mes = 'Novembro';
                break;
            case 12: $mes = 'Dezembro';
                break;
        }

    }
    
    
    ?>