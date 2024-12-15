<?php
/**
 * HELPER
 */
class Helper {

    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    /* public function jqueryDataTable($fields, $search, $orderColumn, $orderDir, $limit, $offset, $dados, $total_all_records, $urlEdit)
      {
      $dados = array();
      $data = array();
      $m = new manutencao();


      // usado pelo order by
      $fields = array(
      0 => 'u.cod_usuario',
      1 => 'u.nome_usuario',
      2 => 'm.descricao',
      3 => 'u.email',
      4 => 'u.gestor_usuario',
      5 => 'u.gestor_grupo',
      );

      // Variaveis usadas na paginação do Jquery DataTable
      $search = (isset($_POST["search"]["value"])) ? $_POST["search"]["value"] : '';
      $orderColumn = (isset($_POST['order']['0']['column'])) ? $fields[$_POST['order']['0']['column']] : '';
      $orderDir = (isset($_POST['order']['0']['dir'])) ? $_POST['order']['0']['dir'] : 'ASC';
      $limit = (isset($_POST["length"]) && $_POST["length"] != -1) ? $_POST['length'] : '10';
      $offset = (isset($_POST["length"]) && $_POST["length"] != -1) ? $_POST['start'] : '0';

      // Traz apenas 10 usuarios utilizando paginação
      $dados = $m->carregaDatatableUsuario($search, $orderColumn, $orderDir, $offset, $limit);

      // relacionamentos entre tabelas
      $join = " INNER JOIN
      z_sga_usuarios AS u
      ON userEmp.idUsuario = u.z_sga_usuarios_id
      LEFT JOIN
      z_sga_manut_funcao AS m
      ON u.cod_funcao = m.idFuncao ";


      // Traz todos os usuarios
      $total_all_records = $m->getCountTable("z_sga_usuario_empresa AS userEmp", $search, $fields, $join);

      // cria linhas customizadas no jquery datatable.
      if (count($dados) > 0):
      foreach ($dados as $key => $value):
      $sub_dados = array();
      $sub_dados[] = $value["cod_usuario"];
      $sub_dados[] = $value["nome_usuario"];
      $sub_dados[] = $value["descricao"];
      $sub_dados[] = $value["email"];
      $sub_dados[] = $value["gestor_usuario"];
      $sub_dados[] = $value["gestor_grupo"];
      $sub_dados[] = '<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" onclick="location.href=\'' . URL . $urlEdit . $value['z_sga_usuarios_id'] . '\'">Editar</button>';
      $data[] = $sub_dados;
      endforeach;
      endif;

      $output = array(
      "draw" => intval(isset($_POST["draw"]) ? $_POST["draw"] : ''),
      "recordsTotal" => count($dados),
      "recordsFiltered" => $total_all_records,
      "data" => $data
      );
      echo json_encode($output);
      } */

    /**
     * Mostra o alert com a mensagem de erro ou sucesso, se contem na
     */
    public function alertMessage() {
        $type = '';
        // Atribuo á variavel $type o tipo de mensagem a ser exibida
        if (isset($_SESSION['msg']['success']) && $_SESSION['msg']['success'] != ''):
            $type = 'success';
        elseif (isset($_SESSION['msg']['error']) && $_SESSION['msg']['error'] != ''):
            $type = 'error';
        elseif (isset($_SESSION['msg']['warning']) && $_SESSION['msg']['warning'] != ''):
            $type = 'warning';
        endif;

        if (!empty($type)){
            $html = '<div class="alert alert-'.$type.' alert-dismissible" role="alert">';
            $html .= '<button type="button" class="close" data-dismiss="alert" aria-label="Fechar" title="Fechar"><span aria-hidden="true">&times;</span></button>';
            $html .= $_SESSION['msg']["$type"];
            $html .= '</div>';
            // Exclui a variavel
            unset($_SESSION['msg']["$type"]);
            echo $html;
        }
    }

    /**
     * Cria variável SESSION['msg'] de erro ou sucesso, conforme parâmetro $type
     * @param $type
     * @param $message
     * @param $url
     */
    public function setAlert($type, $message, $url = '') {
        $_SESSION['msg']["$type"] = $message;
        if (!empty($url)):
            header('Location: ' . URL . '/' . $url);
        endif;
    }

    /**
     * Cria o script de criação do Jquery DataTable
     * @param $idElement Id da table que recebe o Jquery DataTable
     * @param $url Caminho para o método do Controller a ser chamado
     * @param $method POST, GET
     */
    public function scriptDataTable($idElement, $url, $method, $serverside = 'true') {
        // Opções usadas no jquery datatable
        $options = '
            "oLanguage": {
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "Nenhum registro encontrado",
                //"sInfo": "Exibindo de _START_ ate _END_ de _TOTAL_ registros",
                "sInfo": "Página _PAGE_ de _PAGES_",
                "sInfoEmpty": "Nenhum registro para ser exibido",
                //"sInfoFiltered": "(Filtrado de _MAX_ registros no total)",
                "sInfoFiltered": "",
                "sSearch": "Pesquisar:",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sLast": "Último",
                    "sNext": "Proximo",
                    "sPrevious": "Anterior"
                },

                "sLoadingRecords": "&nbsp;",
                "sProcessing": \'<div class="box-loading-datatable"><div class="spinner pull-left"><img src="' . URL . '/assets/images/loader.gif"></div><div class="pull-left" style="margin-top: -10px;">Carregando...</div></div>\'
            },
            ' . (($serverside == 'true') ? '
                "serverSide": true,
                "order": [],' :
                '') . '
            dom: "Bfrtip",
            buttons: [
                "excelHtml5"
            ]
        ';

        // Cria o jquery datatable.
        echo '
            <script type="text/javascript" language="javascript">
                $(document).ready(function () {
                    $("#' . $idElement . '").dataTable({
                        "processing": true,
                        ' . $options . ',
                        "ajax": {
                            url: url + "' . $url . '",
                            type: "' . $method . '"
                        },
                    });
                });
            </script>
        ';
    }
}