<?php
namespace App\DB;
use \Ifsnop\Mysqldump\Mysqldump;
class Backup
{
    private $backupFolder;

    private $host;
    private $database;
    private $username;
    private $password;
    private $port;
    private $bd;
    /**
     * Construtor
     *
     * @param string $backupFolder Pasta onde serão armazenados os backups
     * @param int $maxNumberFiles Número máximo de backups que serão mantidos
     */
    public function __construct($backupFolder)
    {
        $this->backupFolder = $backupFolder;
        $ini = parse_ini_file(__DIR__."/../../php.ini");
      
        $this->host= $ini["DB_HOST"];
        $this->username=  $ini["DB_USERNAME"];
        $this->password = $ini["DB_PASSWORD"];
        $this->database= $ini["DB_DATABASE"];
        $this->port = $ini["DB_PORT"];

        $this->db = new \mysqli(
            $ini["DB_HOST"],
            $ini["DB_USERNAME"],
            $ini["DB_PASSWORD"],
            $ini["DB_DATABASE"],
            $ini["DB_PORT"] );
    }

    /**
     * Gera um backup
     *
     * @return void
     * @throws Exception
     */
    public function generate()
    {
        // Se as informações de conexão com o banco de dados não foram definidas
        if (empty($this->database) or empty($this->username) or empty($this->host)) {
            throw new \Exception('As informações de conexão com o banco de dados não foram definidas');
        }

            

             // Gerando nome único para o arquivo
             $fileName = date('YmdHis') . '.sql.gz';
             $dir=$this->backupFolder;
             $filePath = $this->backupFolder . '/' . $fileName;
 
             if(is_dir($dir)){
                // Definindo informações para geração do backup
             $dump = new Mysqldump("mysql:host={$this->host};dbname={$this->database}", $this->username, $this->password, array(
                'compress' => Mysqldump::GZIP,
              ));
  
              // Gerando backup
              $dump->start($filePath);
              $id_user = session('ID');
              $sql = "INSERT INTO backup (id_usuario, diretorio) VALUE (
                '$id_user',
                '$filePath'
                )";
            $this->db->query($sql);
              
 
            }else{
                throw new \Exception('Diretorio Inválido.');
            } 
    }
}