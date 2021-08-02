<html>
    <head>
        <style type='text/css'>
            .serif{
font-family: serif;
}
.texto {
margin: 0;
}
.negrito {
font-weight: 700
}
.negrito-2 {
font-weight: 600
}
.sublinhar{
text-decoration: underline;
}
.center {
text-align: center
}
.esquerda {
text-align: right;
}
.overline {
text-decoration: overline;
}
.quebra_linha{
display: block;
}
/*configurações de fonts*/
.font-17 {
font-size: 17px;
}
.font-24 {
font-size: 24px;
}
.font-36 {
font-size: 36px;
}
.font-40 {
font-size: 40px;
}
/*confifurações de margin*/
.padding_top_35{
padding-top:35px;
}
.margin_bottom_35{
margin-bottom: 35px;
}
.altura_linhas_19{
line-height: 19px;
}
.altura_linhas_35{
line-height: 35px;
}
.altura_linhas_25{
line-height: 25px;
}
.caixa_informacoes_aluno_cea{
font-size: 22px;
text-align: justify;
padding-right: 46px;
}
.caixa_informacoes_aluno_cea_2{
font-size: 22px;
text-align: justify;
padding-right: 46px;
padding-left: 46px;
}
.caixa_informacoes_aluno_cea p{
margin-top: 5px;
}
.assinatura_cea{
line-height: 22px;
font-size: 22px;
padding-top: 22px;
}
.titulo_cea_2{
margin-top: 35px;
margin-bottom: 35px
}
.data_entrega_cea{
padding-top: 25px;
padding-bottom: 43px;
}
/*configurações de exibição da pagina e conteudo*/
.certificado_conteudo {
-webkit-print-color-adjust: exact;
background-image: url('../images/certificate.jpg');
height: 755px;
width: 1085px;
background-repeat: no-repeat
}
.certificado_pagina {
padding: 5mm;
width: 1085px;
margin: 30px auto;
box-shadow: .5px .5px 7px #000;
border-radius: 2px;
overflow: hidden;
}
/*area de configuraçõa da pagina*/
@page {
size: 297mm 210mm;
margin: 5mm;
size: landscape
}
body {
margin: 0;
padding: 0px !important;
font-family: 'Open Sans', sans-serif
}
p{
margin: 0px;
}
/*SEMPRE DEIXAR NO FIM DO CODIGO configuração de impresão*/
@media print {
.certificado_pagina {
padding: 0;
background: transparent;
margin: 0;
border-radius: 0;
box-shadow: none;
-webkit-box-shadow: none
}
}
        </style>
    </head>
    <body  class="content">
    <div>
    <div class="certificado_pagina">
        <div class="certificado_conteudo">
            <div class="row end-xs">
                <div class="col-xs-10">
                    <div class="" style="padding: 90px 90px 20px 90px; " >
                        <img src="{{ asset('images/logo.png') }}" alt="">
                        <p style="text-align:right ">Issued : <b>{{ $course->created_at->format('d/m/Y') }}</b></p>
                    </div>
                
                    <div class="box text-center">
                    
                        <p class="_padding_top_35 center" style="_padding-top: 125px;">
                        
                            <span class="font-40 negrito  quebra_linha serif"> Openus IT Institute </span> 
                            
                        </p>
                        
                        <!-- <p class="center altura_linhas_19">
                            <span class="font-17 quebra_linha">MACAPÁ-AP – BRASIL</span>
                            <span class="font-17 quebra_linha">ENTIDADE MANTENEDORA: F.L. BITENCOURT</span>
                            <span class="font-17 quebra_linha">ATO DE RECONHECIMENTO nº 00/2000 – CXX- AP</span>
                        </p> -->
                    </div>
                    <div class="box">
                        <p class="_padding_top_35 _margin_bottom_35 center" style="margin-top: 50px;">
                            <span class="_font-36 negrito-2  quebra_linha" style="font-size:25px;">Certificate of Completion</span>
                        </p>
                        <div class="caixa_informacoes_aluno_cea serif padding_top_35" style="margin: 30px 45px 30px 90px;">
                            <p>
                            This is  to certify that, <b>{{ $student->name }}</b>  has successfully completed <b>{{ $studentcourse->duration }}</b> Month <b>{{ $course->title }}</b>   Training,  
                            In  the  month    of <b>{{ $course->created_at->format('d M Y') }}</b> conducted Under <b>Openus IT Institute</b>. He/She secured Grade <b>{{ $studentcourse->result }}</b> Out of <b>5.00</b>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
           
            <table style="margin: 50px 0px 0px 0px; width: 100%;">
                <tr>
                    <td>
                        <div class="box">
                            <div class="assinatura_cea serif center">
                                <img class="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Signature_of_Taufiq_Ismail.svg/1280px-Signature_of_Taufiq_Ismail.svg.png" alt="" style="height:35px;">
                                <p class="negrito center">____________________________</p>
                                <p class="negrito center">Director</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="box">
                            <div class="assinatura_cea serif center">
                                <img class="" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Ismail_Kadare_%28n%C3%ABnshkrim%29.svg/800px-Ismail_Kadare_%28n%C3%ABnshkrim%29.svg.png" alt="" style="height:35px;">
                                <p class="negrito center">____________________________</p>
                                <p class="negrito center">Co-ordinator</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="text-align: center;">
                <h3> www.openusit.com</h3>
                <p class=""> Certificate Verification Link: </p>
                <p> <b>{{ route('student_certified', $student->id ) }}</b></p>
            </div>
            </div>
        </div>
    </div>

</div>
        <div class="">
            <button onclick="window.print()">Print</button>
        </div>
        
    </body>
            

</html>