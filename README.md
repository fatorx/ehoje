<<<<<<< HEAD
SFP - Sistema de Finanças Pessoais
=======

  Sistema de Finanças Pessoais é um sistema que automatiza a planilha de finanças pessoais da BM&F Bovespa [http://www.bmfbovespa.com.br/pt-br/educacional/iniciantes/mercado-de-acoes/planilha-de-orcamento-pessoal/planilha-de-orcamento-pessoal.aspx?idioma=pt-br] 
que é indicada para quem deseja organizar suas despesas afim de um melhor uso de seu dinheiro.

  A planilha original da BM&F Bovespa encontra-se na pasta doc/  note que o que foi feito no sistema foi apenas deixar um pouco mais intuitivo o processo de organização de suas finanças pessoais.



Requisitos
----------------

  - Windows (XP, Vista, 7), Linux, MacOSX
  - Processador 1.0 GHz
  - RAM 512 Mb
  - HD 1 Gb
  - Apache 2.2.*
  - PHP 5.3.*
  - Banco de dados Mysql >5.1



Instalação
----------------

  Para instalar o SFP você precisa seguir os passos abaixo:

  - Instalação do apache com suporte ao PHP e Mysql
      Windows - [http://www.forumweb.com.br/artigo/221/php/instalando-o-xampp-no-windows]
      MacOSX - [http://www.profissionaisti.com.br/2012/04/instalando-apache-php-mysql-no-mac-os-com-mamp/]
      Linux (Ubuntu, Debian) - logado como root digite apt-get install apache php5 mysql-server-5.5 phpmyadmin
    
    
  - Criar um banco de dados chamado "financas"
  
  - Rodar o script de criação e população dos dados iniciais do sistema (que encontram-se na pasta doc), geralmente utilizando o phpmyadmin fornecido juntamente com os softwares já instalados anteriormente
  
  - Editar o arquivo app/Config/database.php onde há "public $default = array ..." setar os valores de login e senha de sua banco de dados

    
    Após a instalação basta digitar [http://localhost/financas/src] em seu navegador e realizar o login, que por padrão vem configurado com email: admin  e senha: admin. Pronto!
    Basta começar marcar suas despesas e receitas e acompanhar sua evolução.
    O sistema não possui manual porque é autoexplicativo. Muito fácil de usar!

    
### Online!
Para utilizar este sistema sem intalar em seu computador basta acessar http://ehoje.net 



Suporte
------------

  Por se tratar de um sistema simples e não customizável, de momento, não fornecemos suporte.
  
  Caso você seja um usuário final e não domine as técnicas de instalação dos softwares acima citados mas deseja utilizar o sistema para acompanhar seu progresso enquanto organiza sua vida financeira
  entre em contato comigo que eu instalo o sistema e realizo as configurações necessárias. Basta enviar um email para <andrecardosodev@gmail.com> que negociaremos a instalação, não se preocupe, cobro somente
  um valorzinho simbólico. A finalidade deste sistema não é fazer dinheiro, apenas cobrarei a instalação pelo fato de levar um bom tempo para esta configuração, e como todos sabem tempo é dinheiro.
  
  
  
   

------------------------------------------------------------------------------------------------

MÓDULOS/FUNCIONALIDADES A SEREM CRIADAS
  
  
* Agendamentos de pagamentos de conta
* Envio de email de lembrete de contas agendadas
* Possibilitar informar tipo de despesa/receita/investimento manualmente


------------------------------------------------------------------------------------------------



 
  
  
  Atenciosamente Andre Cardoso.
  
  
=======
ehoje
=====

repositório para o desenvolvimento do sistema ehoje
>>>>>>> c9ae219517e7e0f0eb7cad124dc6704b00b19b22
