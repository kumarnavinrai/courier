<?php
/* Newsletter.php
    for Carlson A. Soares
        soares_289@hotmail.com
        
    You can change and use this class at you on will, just remember to keet the right credits.
*/

    class NewsLetter{
    
        private $dbhost;        //host da base de dados
		private $dbuser;        //Usuario de conexão
		private $dbpass;        //senha de conexão
		private $dbname;        //nome do banco de dados
		private $dbtable;       //Tabela onde ficaram os emails
    
    
        //Construtor da classe / Class constructoe
        function __construct( $host = 'localhost', $user = 'root', $pass = '123456', $name = 'teste', $table = 'emails' ) {
            $this->dbhost  = $host;
            $this->dbuser  = $user;
            $this->dbpass  = $pass;
            $this->dbname  = $name;
            $this->dbtable = $table;
        }
        
        
        //Conecta na base de dados / Connect to MySQL Database
        function connect(){
            $conn = mysql_connect($this->dbhost, $this->dbuser, $this->dbpass) or die ('Erro ao conectar na base de dados');
            mysql_select_db($this->dbname);
            return $conn;
        }
        
        
        //Cria a tabela usada pela classe / Create the table used by the class
        function createTable(){
            
            $conn = $this->connect();
            
            $sql = 'CREATE TABLE IF NOT EXISTS ' . $this->dbtable . 
					'( codigo INTEGER NOT NULL AUTO_INCREMENT, email VARCHAR(100), CONSTRAINT pk_' . $this->dbtable . 
					' PRIMARY KEY (codigo)) ENGINE=INNODB CHARSET=utf8';
            $ret = mysql_query( $sql, $conn);
            mysql_close( $conn );
			return $ret;
        }
        
        
        //Lista os emails que existem na base de dados. / List all emails in the table
        function listEmails(){
            
            $conn = $this->connect();
            $ret  = '';
            
            $sql   = 'select email from ' . $this->dbtable;
			$query = mysql_query( $sql, $conn );
            
			while( $row = mysql_fetch_assoc( $query ) ){
				$ret .= $row['email'] . ";\n";
			}
            
            mysql_close( $conn );
            
			return $ret;
        }
        
        
        //Adiciona um novo email / Add a new email
        function addEmail( $email ){
            
            $conn = $this->connect();
            
            //By default, mysql is not case sensitive, but you can change it in my.cnf file, to prevent error, change all to lowercase
            $sql   = 'select email from ' . $this->dbtable . ' where email = lower("' . trim($email) . '")';
			$query = mysql_query( $sql, $conn);
			
			if( mysql_num_rows( $query ) > 0 ){
				return 'EMAIL JA CADASTRADO'; //Email already exist msg
			} else {
				$sql = 'insert into ' . $this->dbtable . '(email) value(lower("' . $email . '"))';
				mysql_query( $sql, $conn);
			}
            
            mysql_close( $conn );
            
            return 'EMAIL SALVO COM SUCESSO'; //Email sucefully saved
        }
        
        
        //Remove um email da lista / Remove a email from the table
        function removeEmail( $email ){
        
            $conn = $this->connect();
        
            $sql   = 'select email from ' . $this->dbtable . ' where email = lower("' . trim($email) . '")';
			$query = mysql_query( $sql, $conn);
			
			if( mysql_num_rows( $query ) > 0 ){
				$sql = 'delete from ' . $this->dbtable . ' where email = "' . trim($email) . '"';
				mysql_query( $sql, $conn);
			} else {
				return 'EMAIL NÃO CADASTRADO'; //Email not exists msg
			}
            
            mysql_close( $conn );
            
            return 'EMAIL REMOVIDO COM SUCESSO'; //Email removed sucefully
        }
        
    }
?>

