<?php
namespace App\DB;
use \Ifsnop\Mysqldump\Mysqldump;
class Backup
{
    private $backupFolder;
    private $maxNumberFiles;

    private $host;
    private $database;
    private $username;
    private $password;

    /**
     * Construtor
     *
     * @param string $backupFolder Pasta onde serão armazenados os backups
     * @param int $maxNumberFiles Número máximo de backups que serão mantidos
     */
    public function __construct($backupFolder, $maxNumberFiles)
    {
        $this->backupFolder = $backupFolder;
        $this->maxNumberFiles = $maxNumberFiles;
        $ini = parse_ini_file(__DIR__."/../../php.ini");
      
        $this->host= $ini["DB_HOST"];
        $this->username=  $ini["DB_USERNAME"];
        $this->password = $ini["DB_PASSWORD"];
        $this->database= $ini["DB_DATABASE"];
             
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
          
              // Limpando backups antigos
              $this->clearOldFiles();
 
            }else{
                throw new \Exception('Diretorio incorreto');
            } 
    }

    /**
     * Limpa os arquivos de backups antigos
     *
     * @return void
     */
    private function clearOldFiles()
    {
        // Buscando itens na pasta
        $files = new \DirectoryIterator($this->backupFolder);

        // Passando pelos itens
        $sortedFiles = array();
        foreach ($files as $file) {
            // Se for um arquivo
            if ($file->isFile()) {
                // Adicionando em um vetor, sendo o índice a data de modificação
                // do arquivo, para assim ordenarmos posteriormente
                $sortedFiles[$file->getMTime()] = $file->getPathName();
            }
        }

        // Ordena o vetor em ordem decrescente
        arsort($sortedFiles);

        // Passando pelos arquivos
        $numberFiles = 0;
        foreach ($sortedFiles as $file) {
            $numberFiles++;
            // Se a quantidade de arquivo for maior que a quantidade
            // máxima definida
            if ($numberFiles > $this->maxNumberFiles) {
                // Removemos o arquivo da pasta
                unlink($file);
                //echo "Apagado backup '{$file}'" . PHP_EOL;
            }
        }

    }

}