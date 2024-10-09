<?php
class CacheQueryController extends Controller {

  private $getcachetest;

    public function __construct() {
        parent::__construct();
        $this->getcachetest = new Cachequery();
      
    }

    public function index() {   
      $conf = new Cachequery();
      $data = [];
      $cache_key = 'listUsuarios';
      $cache_ttl = 600;

     // $res = $conf->listUsuarios();
     // print_r($res);
      $data['res'] = $this->get_cached_data2($cache_key, $cache_ttl)['data'];

       $this->loadTemplate('cache', $data); 
    }


    /**
   * @return .cache
   */
    function get_cached_data($cache_key, $cache_ttl) {
      //$cache_file = 'cache/' . $cache_key . '.cache';
      //$cache_file = __DIR__ . '/cache/' . $cache_key . '.cache';

      // verifica se a pasta cache existi, senão deve criar neste diretório atual
      if (!file_exists( __DIR__ . '/cache')) {
          mkdir( __DIR__ . '/cache', 0777, true);
      }

      $cache_file = __DIR__ . '/cache/' . $cache_key . '.cache';        
  
      if (file_exists($cache_file) && time() - filemtime($cache_file) < $cache_ttl) {
          // Se o arquivo de cache existe e ainda está dentro do tempo de vida, ler e retornar o conteúdo do arquivo
          $cached_data = file_get_contents($cache_file);
          return unserialize($cached_data);
      } else {
          // Arquivo de cache não existe ou está expirado, executar a query
          $data =  $this->getcachetest->listUsuarios();

          // Salvar o resultado em um arquivo de cache com o nome da chave de identificação
          $cached_data = serialize($data);
          file_put_contents($cache_file, $cached_data);
          // Retornar o resultado
          return $data;
      }
  } 


  /**
   * @return JSON
   */
  function get_cached_data2($cache_key, $cache_ttl) {
    // Verifica se a pasta cache existe, senão cria neste diretório atual
    if (!file_exists(__DIR__ . '/cache')) {
        mkdir(__DIR__ . '/cache', 0777, true);
    }

    // Define o caminho do arquivo de cache com extensão .json
    $cache_file = __DIR__ . '/cache/' . $cache_key . '.json';        

    // Verifica se o arquivo de cache existe e se ainda está dentro do tempo de vida
    if (file_exists($cache_file) && time() - filemtime($cache_file) < $cache_ttl) {
        // Ler e retornar o conteúdo do arquivo de cache
        $cached_data = file_get_contents($cache_file);
        // Decodifica o JSON armazenado para retornar os dados no formato original
        return json_decode($cached_data, true);
    } else {
        // Arquivo de cache não existe ou está expirado, executar a query
        $data =  $this->getcachetest->listUsuarios();

        // Codifica o resultado em JSON e salva o arquivo de cache
        $cached_data = json_encode($data);
        file_put_contents($cache_file, $cached_data);

        // Retorna o resultado
        return $data;
    }
}
    


}