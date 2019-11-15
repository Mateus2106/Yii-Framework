<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Sistema de Rotas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>Quando uma aplicação Yii começa a processar uma URL requerida, o primeiro passo necessário é obter a rota pela análise da URL. A rota é usada para instanciar o controller da ação correspondente para manipular a requisição. Todo este processo é chamado de roteamento.</p>

	<p>O processo inverso do roteamento é chamada de criação de URL, onde é criado uma URL a partir de uma determinada rota e seus parâmetros.</p>

	<p>O ponto central responsável pelo roteamento e pela criação de URL é o gerenciador de URL, na qual é registrado como o componente da aplicação <b>urlManager</b>. O gerenciador de URL fornece o método parseRequest() para analisar um requisição de entrada a fim de obter uma rota e seus parâmetros associados e o método createUrl() para criar uma URL a partir de uma rota e seus parâmetros associados.</p>

	<p>Ao configurar o componente urlManager na configuração da aplicação, poderá fazer com que sua aplicação reconheça de forma arbitrária diversos formatos de URL sem modificar o código existente da aplicação.</p><hr>
	
	<h3><b>Formatos de URL</b></h3>
	<p>O gerenciador de URL suporta dois formatos de URL: o formato de URL padrão e o formato de URL amigável(pretty URL).</p>

	<p>O formato de URL padrão usa um parâmetro chamado <b>r</b> para representar a rota, e os demais parâmetros representam os parâmetros associados a rota. Por exemplo, a URL <b>/index.php?r=post/view&id=100</b> representa a rota <b>post/view</b> e o parâmetro <b>id</b> com o valor 100. O formato de URL padrão não exige qualquer tipo de configuração no gerenciador de URL e trabalha em qualquer servidor Web.</p>

	<p>O formato de URL amigável usa um caminho adicional após o nome do script de entrada para representar a rota e seus parâmetros. Por exemplo, o caminho adicional na URL <b>/index.php/post/100</b> é <b>/post/100</b>, onde pode representar, em uma adequada regra de URL, a rota <b>post/view</b> e o parâmetro <b>id</b> com o valor 100. Para usar o formato de URL amigável(pretty URL), você precisará escrever um conjunto de regras de URLs de acordo com a necessidade sobre como as URLs devem parecer.</p>

	<h3><b>Roteamento</b></h3>
	<p>O roteamento envolve duas etapas. Na primeira etapa, a requisição de entrada é transformada em uma rota e seus parâmetros. Na segunda etapa, a ação do controller correspondente a rota analisada será criada para processar a requisição.</p>

	<p>Ao utilizar o formato de URL padrão, a análise de uma requisição para obter uma rota é tão simples como pegar o valor via GET do parâmetro r.</p>

	<p>Ao utilizar o formato de URL amigável(pretty URL), o gerenciado de URL examinará as regras de URLs registradas para encontrar alguma correspondência que poderá resolver a requisição em uma rota. Se tal regra não for encontrada, uma exceção NotFoundHttpException será lançada.</p>

	<p>Uma vez que a requisição analisada apresentar uma rota, é hora de criar a ação do controller identificado pela rota. A rota é dividida em várias partes pelo separador barra (“/”). Por exemplo, a rota site/index será dividida em duas partes: site e index. Cada parte é um ID que pode referenciar a um módulo, um controller ou uma ação. A partir da primeira parte da rota, a aplicação executará as seguintes etapas para criar o módulo (se existir), o controller e a ação:</p>

	<ol>
		<li>Define a aplicação como o módulo atual.</li>
		<li>Verifica se o mapa do controller do módulo contém o ID atual. Caso exista, um objeto do controller será criado de acordo com a configuração do controller encontrado no mapa e a etapa 3 e 4 não serão executadas.</li>
		<li>Verifica se o ID referência a um módulo listado na propriedade modules do módulo atual. Caso exista, um módulo será criado de acordo com as configurações encontradas na lista e a etapa 2 será executada como etapa seguinte do processo, no âmbito de usar o contexto do módulo recém-criado.</li>
		<li>Trata o ID como um ID do controller e cria um objeto do controller. Então segue para a próxima etapa, como parte restante do processo.</li>
		<li>O controller procura o ID atual em seu mapa de ações. Caso exista, será criado uma ação de acordo com a configuração encontrada no mapa. Caso contrário, o controller tentará criar uma ação inline que é definida por um método da ação correspondente ao ID atual.</li>
		<li>Nas etapas acima, se ocorrer qualquer erro, uma exceção NotFoundHttpException será lançada, indicando a falha no processo de roteamento.</li>
	</ol>
	<hr>

	<h3><b>Usando URLs Amigáveis(Pretty URLs)</b></h3>
	<p>Para utilizar as URLs amigáveis, configure o componente urlManager na configuração da aplicação conforme o exemplo a seguir:</p>
	<div class="commands">
		<p>
		'components' => [<br>
        	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'urlManager' => [<br>
           		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'enablePrettyUrl' => true,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'showScriptName' => false,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'enableStrictParsing' => false,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'rules' => [<br>
               		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp// ...<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp],<br>
        	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp],<br>
    	],
    	</p>
	</div>
	<p>A propriedade <b>enablePrettyUrl</b> é obrigatória para habilitar o formato de URL amigável. O restante das propriedades são opcionais. No entanto, a configuração utilizada acima é a mais utilizada.</p>

	<p><b>showScriptName:</b> esta propriedade determina se o script de entrada deve ser incluído ou não nas URLs criadas. Por exemplo, ao invés de criar uma URL /index.php/post/100, definindo esta propriedade como false, a URL /post/100 será gerada.</p>

	<p><b>enableStrictParsing:</b> esta propriedade habilita uma análise rigorosa da requisição. Caso a análise rigorosa estiver habilitada, a URL da requisição deve corresponder pelo menos a uma das regras definidas pela propriedade rules a fim de ser tratado como uma requisição válida, caso contrário a exceção NotFoundHttpException será lançada. Caso a análise rigorosa estiver desabilitada, as regras definidas pela propriedade rules não serão verificadas e as informações obtidas pela URL serão tratadas como a rota da requisição.</p>
	
	<p><b>rules:</b> esta propriedade contém uma lista de regras especificando como serão analisadas e criadas as URLs. Esta é a principal propriedade que você deve trabalhar para criar URLs cujos formatos satisfaçam a sua exigência em particular.</p>

	<h3><b>Regras de URLs</b></h3>
	<p>Quando um formato de URL amigável estiver habilitada, o gerenciador de URL utilizará as regras de URLs declaradas na propriedade <b>rules</b> para analisar as requisições e para criar URLs. Em particular, para analisar uma requisição, o gerenciador de URL verificará as regras na ordem em que foram declaradas e só enxergará a primeira regra que corresponda a URL da requisição. A regra que foi correspondida é então utilizada para obter a rota e seus parâmetros a partir de sua análise.</p>

	<p>Você pode configurar a propriedade <b>rules</b> com um array composto de pares de chave-valor, onde a chave é o padrão da regra e o valor serão as rotas. Cada par de padrão-rota define uma regra de URL. Como por exemplo:</p>
	<div class="commands">
		<p>
		'components' => [<br>
        	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'urlManager' => [<br>
           		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'enablePrettyUrl' => true,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'showScriptName' => false,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'enableStrictParsing' => false,<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'rules' => [<br>
               		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'site/home' => 'site/index',<br>
               		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'site/rotas' => 'site/about',<br>
                	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'site/login' => 'site/login',<br>
                	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'usuario/usuarios' => 'usuario/index',<br>
            	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp],<br>
        	&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp],<br>
    	],
    	</p>
	</div>
</div>
