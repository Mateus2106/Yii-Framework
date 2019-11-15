<?php
/* @var $this yii\web\View */
$this->title = 'Yii Framework';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Yii Framework</h1>

        <p class="lead">Yii é um framework de alta performance em PHP que utiliza componentes para o desenvolvimento de pequenas/médias/grandes aplicações Web.</p>

        <p><a class="btn btn-lg btn-success" href="http://localhost:8080/usuario/usuarios">CRUD</a></p>
    </div>
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <hr>
                <h2><b>Instalação</b></h2>
                <p>Você pode instalar o Yii de duas maneiras, usando o gerenciador de pacotes do Composer ou baixando um arquivo morto. A primeira é a maneira mais utilizada, pois permite instalar novas extensões ou atualizar o Yii simplesmente executando um único comando.</p>
                <h4><b>Instalando via Composer</b></h4>
                <p>No Linux e Mac OS X, você só precisa executar os seguintes comandos:</p>
                <div class="commands">
                    <p>curl -sS https://getcomposer.org/installer | php<br>
                    sudo mv composer.phar /usr/local/bin/composer</p>
                </div>
                <p>No Windows, você baixará e executará o <a href="https://getcomposer.org/Composer-Setup.exe">Composer-Setup.exe</a>.<br>
                Se você já tinha o Composer instalado antes, use uma versão atualizada. Você pode atualizar o Composer executando:</p>
                <div class="commands">
                    <p>composer self-update</p>
                </div>
                <h4><b>Instalando o Yii</b></h4>
                <p>Com o Composer instalado, você pode instalar o modelo de aplicativo Yii executando o seguinte comando na pasta onde você criará seu projeto:</p>
                <div class="commands">
                    <p>composer create-project --prefer-dist yiisoft/yii2-app-basic basic</p>
                </div>
                <p>Isso instalará a versão estável mais recente do modelo de aplicativo Yii em um diretório chamado <b>basic</b>. Você pode escolher um nome de diretório diferente, se desejar.</p>
                <h4><b>Instalando a partir de um arquivo morto</b></h4>
                <p>A instalação do Yii a partir de um arquivo morto envolve três etapas:</p>
                <ol>
                    <li>Faça o download do arquivo morto de <a href="https://www.yiiframework.com/download">yiiframework.com</a></li>
                    <li>Descompacte o arquivo baixado em uma pasta acessível pela Web.</li>
                    <li>Modifique o <b>config/web.php</b> arquivo digitando uma chave secreta para o <b>cookieValidationKey</b> item de configuração (isso é feito automaticamente se você estiver instalando o Yii usando o Composer):</li>
                </ol>
                <div class="commands">
                    <p>'cookieValidationKey' => 'coloque sua chave secreta aqui',</p>
                </div>
                <h2><b>Executando o servidor</b></h2>
                <p>Após a conclusão da instalação, você pode iniciar o servidor da web PHP embutido executando o seguinte comando do console enquanto estiver no webdiretório do projeto:</p>
                <div class="commands">
                    <p>php yii serve</p>
                </div>
                <p>Por padrão, o servidor HTTP escutará a porta 8080. No entanto, se essa porta já estiver em uso ou você desejar atender a vários aplicativos dessa maneira, convém especificar qual porta usar. Basta adicionar o argumento --port:</p>
                <div class="commands">
                    <p>php yii serve --port=8888</p>
                </div>
                <p>Você pode usar seu navegador para acessar o aplicativo Yii instalado com o seguinte URL:</p>
                <div class="commands">
                    <p>http://localhost:8080/</p>
                </div>
                <hr>
                <h2><b>Como o Yii se Compara a Outros Frameworks</b></h2>
                <p>Se já estiver familiarizado com um outro framework, você pode gostar de saber como o Yii se compara:</p>
                <ul>
                    <li>Como a maioria dos frameworks PHP, o Yii implementa o padrão de arquitetura MVC e promove a organização do código baseada nesse padrão.</li>
                    <li>Yii tem a filosofia de que o código deveria ser escrito de uma maneira simples, porém elegante. O Yii nunca vai tentar exagerar no projeto só para seguir estritamente algum padrão de projeto.</li>
                    <li>Yii é um framework completo fornecendo muitas funcionalidades comprovadas e prontas para o uso, tais como: construtores de consultas (query builders) e ActiveRecord tanto para bancos de dados relacionais quanto para NoSQL, suporte ao desenvolvimento de APIs RESTful, suporte a caching de múltiplas camadas, e mais.</li>
                    <li>Yii é extremamente extensível. Você pode personalizá-lo ou substituir quase todas as partes do código central. Você também pode tirar vantagem de sua sólida arquitetura de extensões para utilizar ou desenvolver extensões que podem ser redistribuídas.</li>
                    <li>Alta performance é sempre um objetivo principal do Yii.</li>
                </ul>     
            </div>
        </div>

    </div>
</div>
