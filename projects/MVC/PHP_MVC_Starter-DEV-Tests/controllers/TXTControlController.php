<?php
class TXTControlController extends Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() { 

    // exemplo com TXT
      $file = __DIR__ . '/conf.ini';
      // Lê o arquivo de configuração e retorna um array associativo
      $settings = parse_ini_file($file);

      if ($settings !== false) {
          // Exemplo de uso das configurações
          if ($settings['background'] == 1) {
          };
         
          $backgroundColor = $settings['background']; // Corrigi o erro de digitação de "backgound" para "background"
          $isActive = $settings['isActive'] ?  $backgroundColor : '';
          $fontSize = $settings['fontSize'];
          $dynamic_class = $settings['ENABLE_STICKY'] ? 'sticky' : 'normal';

          // Using Heredoc
          $html = <<<HTML
          <style>
            .normal{
              color:coral;
            }
            .sticky{
              color: blue;
            }
          </style>
          <p style="background-color: {$isActive};font-size: {$fontSize}">Background ativo</p>
          <h1 class="{$dynamic_class}">agora sim  podemos digitar a vontade {$isActive}</h1>
          HTML;          
          echo $html;   
          echo "Tamanho da fonte: " . $settings['fontSize'] . "<br>";

          if ($settings['hasLog'] == 1) {
              echo "O log está ativado.<br>";
          }
          } else {
              echo "Erro ao ler o arquivo de configuração.";
          }
          echo '<hr>';

        // exemplo com INI
        $fileini = __DIR__ . '/settings.ini';
        $settingsFile = parse_ini_file($fileini);
        print_r($settingsFile);

        $config['settings']['background'] = 0; // Exemplo: mudar o background para 0

        // Passo 3: Escrever de volta no arquivo .ini
        $content = '';
        foreach ($config as $section => $values) {
            $content .= "[$section]\n";
            foreach ($values as $key => $value) {
                $content .= "$key=$value\n";
            }
        }
    // Escrever o novo conteúdo no arquivo
      file_put_contents($fileini, $content);
  }

}