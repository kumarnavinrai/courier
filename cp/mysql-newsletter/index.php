<?php
	if( isset( $_GET['acao'] ) ){
		
        require_once( 'newsletter.php' );
        
        $news = new NewsLetter();
        $msg  = '';
        
		if( $_GET['acao'] == 'criar' ){	/*CRIA A TABELA USADA*/
        
            if($news->createTable()) $msg  = 'TABELA CRIADA COM SUCESSO';
            
		} elseif( $_GET['acao'] == 'listar' ) {	/*LISTA OS EMAILS*/
			
            print $news->listEmails();
            exit;
            
		} elseif( $_GET['acao'] == 'salvar' ) {	/*SALVA UM NOVO EMAIL*/
			
			$msg = $news->addEmail( $_POST['email'] );
			
		} elseif( $_GET['acao'] == 'deletar' ) {	/*DELETA UM EMAIL*/
			
			$msg = $news->removeEmail( $_POST['email'] );
		}
		
		//Desconecta da base de dados
		
		print '<script type="text/javascript">alert("' . $msg . '"); window.location = "' . $_SERVER['HTTP_REFERER'] . '";</script>';
		exit;
	}
?>

<html>
    <head>
        <title>TESTE</title>
    </head>
    <body>
        <p>Para usar esse arquivo de teste, é preciso ter um servidor mysql e uma conexão valida com o mesmo.</p>
        <p>Antes de continuar, lembre-se de configurar na classe NEWSLETTER.PHP nas linhas entre 11 e 15 para conectar corretamente a base de dados, ou no arquivo INDEX.PHP na linha 6 para passar os parametros de conexão correto para a classe.</p>
        
        <br /><br />
        
        <p>To use this test script you will need a mysql server with a valid connection with in.</p>
        <p>Before you continue, remember to set the right value in the class NEWSLETTER.php in line between lines 11 and 15 to connect to you mysql connection or in the INDEX.php file, in the line 6, to pass the right connection parameter to the class.</p>
        
        <div id="form">
            <form action="index.php?acao=salvar" method="post" name="mailnews">
                <caption>Formulario de exemplo para ADICIONAR email - ADD Email</caption>
                <label>EMAIL<br>
                    <input type="text" name="email" value="" />
                </label>
                <input type="submit" name="enviar" value="OK" />
                <?php if( isset( $msg ) ) print '<br /><span>' . $msg . '</span>'; ?>
            </form>
        </div>
        
        <br />
        
        <div id="form">
            <form action="index.php?acao=deletar" method="post" name="mailnews">
                <caption>Formulario de exemplo para EXCLUIR email - DELETE EMAILS</caption>
                <label>EMAIL<br>
                    <input type="text" name="email" value="" />
                </label>
                <input type="submit" name="enviar" value="OK" />
                <?php if( isset( $msg ) ) print '<br /><span>' . $msg . '</span>'; ?>
            </form>
        </div>
        
        <br />
        
        <a href="index.php?acao=listar">LINK PARA LISTAR EMAIL - LIST EMAILS</a><br />
        <a href="index.php?acao=criar">LINK PARA CRIAR TABELA - CREATE THE TABLE</a>
    </body>
</html>