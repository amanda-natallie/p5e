<?php require 'header.php'; ?>
<div class="banner_home service-banner relative" style="background: #ECF0F1; height: auto">
                <div class="container-fluid servicos-sede-virtual">
                    <div class="row">
                        <div class="space-50"></div>
                        <div class="space-50 visible-sm visible-xs"></div>
                        <div class="space-50 visible-sm visible-xs"></div>
                        <div class="space-50 visible-sm visible-xs"></div>
                        <div class="space-50  visible-xs"></div>
                        <div class="space-50  visible-xs"></div>
                    </div>
                    <div class="clearfix"></div>
                    
                    <div class="row">
                        
                        <div class="col-md-12 step1">
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2><?= strip_tags($texto[65]); ?></h2>
                                <?= $texto[66]; ?>
                            </div>
                            
                            <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <span>Razão Social ou Nome Fantasia da empresa</span>
                                <input type="text" class="cmp-orc" name="nome" id="nome" value="" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 campo-orcamento">
                                <span>CNPJ/CPF</span>
                                <input type="text" class="cmp-orc" name="cpfcnpj" id="cpfcnpj" value="" />
                            </div>
                            <div class=" clearfix"></div>
                            <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <span>Pessoa para contato</span>
                                <input type="text" class="cmp-orc" name="contato" id="contato" value="" />
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 campo-orcamento">
                                <span>Telefone principal</span>
                                <input type="text" class="cmp-orc" name="telefone" id="telefone" value="" />
                            </div>
                            <div class=" clearfix"></div>
                            <div class="col-md-4 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <span>Celular</span>
                                <input type="text" class="cmp-orc" name="celular" id="celular" value="" value=""/>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 campo-orcamento">
                                <span>Email</span>
                                <input type="email" class="cmp-orc" name="email" id="email" value="" />
                                <span id="mes-aviso2" style=" float: left; margin-top: 5px; display: none; color: #F00;">Insira um email válido!</span>
                            </div>
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <div class="alert alert-warning orc-aviso1" style=" display: none">
                                    <strong>Atenção!</strong> Existem campos que precisam ser preenchidos.
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <button onclick="orcamento1()" class="stroke-red-button hvr-float-shadow bt-orcamento">PRÓXIMO PASSO</button>
                            </div>
                        </div>
                        
                        <div class="col-md-12 step2" style=" display: none">
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2><?= strip_tags($texto[67]); ?></h2>
                                <?= $texto[68]; ?>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 col-xs-12 col-md-offset-3 campo-orcamento">
                                <span>Quantidade</span>
                                <input type="number" class="cmp-orc" name="quantidade" id="quantidade" value="" />
                            </div>   
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <div class="alert alert-warning orc-aviso2" style=" display: none">
                                    <strong>Atenção!</strong> Preencha a quantidade com um numero maior que zero.
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <button onclick="orcamento2()" class="stroke-red-button hvr-float-shadow bt-orcamento">PRÓXIMO PASSO</button>
                                <div class="clearfix"></div>
                                <a class="link-retornar" style=" cursor: pointer" onclick="voltar(1)"><img src="assets/img/voltar.png" alt="Voltar" title="Voltar" style=" height: 10px; margin-right: 5px" /> retornar ao passo anterior</a>
                            </div>
                        </div>
                        
                        <div class="col-md-12 step3"  style=" display: none">
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2><?= strip_tags($texto[69]); ?></h2>
                                <?= $texto[70]; ?>
                            </div>
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Serviço</strong></span>
                                    <img src="assets/img/icone1.png" alt="Serviço" title="Serviço" style=" margin-top: 10px" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="1" name="servico" id="servico" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Comércio</strong></span>
                                    <img src="assets/img/icone2.png" alt="Comércio" title="Comércio" style=" margin-top: 10px" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="2" name="servico" id="servico" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Indústria e Comércio</strong></span>
                                    <img src="assets/img/icone3.png" alt="Indústria e Comércio" title="Indústria e Comércio" style=" margin-top: 10px" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="3" name="servico" id="servico" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Indústria/Comércio/Serviço</strong></span>
                                    <img src="assets/img/icone4.png" alt="Indústria/Comércio/Serviço" title="Indústria/Comércio/Serviço" style=" margin-top: 10px" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="4" name="servico" id="servico" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <div class="alert alert-warning orc-aviso3" style=" display: none">
                                    <strong>Atenção!</strong> Selecione uma opção.
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <button onclick="orcamento3()" class="stroke-red-button hvr-float-shadow bt-orcamento">PRÓXIMO PASSO</button>
                                <div class="clearfix"></div>
                                <a class="link-retornar" style=" cursor: pointer" onclick="voltar(2)"><img src="assets/img/voltar.png" alt="Voltar" title="Voltar" style=" height: 10px; margin-right: 5px" /> retornar ao passo anterior</a>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 step4" style=" display: none">
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2><?= strip_tags($texto[71]); ?></h2>
                                <?= $texto[72]; ?>
                            </div>
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 col-md-offset-3 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Simples Nacional</strong></span>
                                    <img src="assets/img/regime.png" alt="Simples Nacional" title="Simples Nacional" style=" margin-top: 10px; width: 100%" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="1" name="regime" id="regime" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Lucro Real</strong></span>
                                    <img src="assets/img/regime2.png" alt="Lucro Real" title="Lucro Real" style=" margin-top: 10px; width: 100%" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="2" name="regime" id="regime" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-2 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Lucro Presumido</strong></span>
                                    <img src="assets/img/regime3.png" alt="Lucro Presumido" title="Lucro Presumido" style=" margin-top: 10px; width: 100%" />
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="3" name="regime" id="regime" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <div class="alert alert-warning orc-aviso4" style=" display: none">
                                    <strong>Atenção!</strong> Selecione uma opção.
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <button onclick="orcamento4()" class="stroke-red-button hvr-float-shadow bt-orcamento">PRÓXIMO PASSO</button>
                                <div class="clearfix"></div>
                                <a class="link-retornar" style=" cursor: pointer" onclick="voltar(3)"><img src="assets/img/voltar.png" alt="Voltar" title="Voltar" style=" height: 10px; margin-right: 5px" /> retornar ao passo anterior</a>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-12 step5" style=" display: none" >
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <h2><?= strip_tags($texto[73]); ?></h2>
                                <?= $texto[74]; ?>
                            </div>
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 col-md-offset-3 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 100</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="1" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 500</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="2" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 1000</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="3" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 2000</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="4" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div>  
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 3000</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="4" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div> 
                            
                            <div class="col-md-1 col-sm-12 col-xs-12 campo-orcamento" style=" text-align: center !important;">
                                <label style=" cursor: pointer; float: left; text-align: center !important; ">
                                    <span><strong>Até 5000</strong></span>
                                    <div style="float: left !important; width: 100% !important; text-align: center !important; margin-top: 10px !important">
                                        <input type="radio" value="4" name="nota" id="nota" style="border: 0; "/>
                                    </div>                                    
                                </label>
                            </div> 
                            
                            <div class="col-md-8 col-sm-12 col-xs-12 col-md-offset-2 campo-orcamento">
                                <div class="alert alert-warning orc-aviso5" style=" display: none">
                                    <strong>Atenção!</strong> Selecione uma opção.
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 cab-orcamento">
                                <button onclick="orcamento5()" class="stroke-red-button hvr-float-shadow bt-orcamento">PRÓXIMO PASSO</button>
                                <div class="clearfix"></div>
                                <a class="link-retornar" style=" cursor: pointer" onclick="voltar(4)"><img src="assets/img/voltar.png" alt="Voltar" title="Voltar" style=" height: 10px; margin-right: 5px" /> retornar ao passo anterior</a>
                            </div>
                            
                        </div>
                        <div class="col-md-12 step6" id="step6" style=" display: none" >
                            
                        </div>
                        
                        
                    </div>
                    
                    
                    
                </div>
    
    <?php require 'footer.php'; ?>  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/jquery/jquery-1.10.1.min.js"><\/script>')</script>
    <script type="text/javascript" src="app-adm/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
    <script src="app-adm/js/jquery.filter_input.js"></script>
    <script src="app-adm/js/jquery.mask.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#email').filter_input({regex:'[a-zA-Z0-9-@._-]'});
            $('#cpf').filter_input({regex:'[0-9]'});            
            $('#quantidade').filter_input({regex:'[0-9]'});            
            $('#nome').filter_input({regex:'[a-zA-Z-çãáàâäêéèëîíìïõôóòöûúùü\\s]'});
            $('#contato').filter_input({regex:'[a-zA-Z-çãáàâäêéèëîíìïõôóòöûúùü\\s]'});
            
        });
    </script>       
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
            $(':input[name=cpfcnpj]').mask(CpfCnpjMaskBehavior, cpfCnpjpOptions);
    })

    $("#telefone").keydown(function(){
        $("#telefone").mask("(99) 9999-9999");
    });
    
    $("#celular").keydown(function(){
        $("#celular").mask("(99) 99999-9999");
    });
 </script>
</div>



