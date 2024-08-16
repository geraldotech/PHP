<?php 
 

 function dynamicQuery($empresa, $idgestor){
  $empresax =  !empty($empresa) ? "WHERE fva.idEmpresa = '$empresa'" : "";
  $idgestor = !empty($idgestor) ? "AND fva.idGestor = '$idgestor'": "";

  $sql = "SELECT  fva.*, 
  pl1.nomeUsuario AS usuarioGestor,
  pl1.login AS gestorLogin,
  pl2.nomeUsuario AS usuarioGestorAlternativo,
  pl2.login AS alternativoLogin,
  fva.idEmpresa
  FROM 
      z_sga_fluxo_v2_gestor_altarnativo AS fva
  INNER JOIN 
      z_sga_param_login AS pl1 ON fva.idGestor = pl1.idLogin
  INNER JOIN 
      z_sga_param_login AS pl2 ON fva.idGestorAlternativo = pl2.idLogin
  INNER JOIN 
        z_sga_param_v2_login_empresa AS pl3 ON pl3.idLogin = pl2.idLogin            
   $empresax $idgestor;";

  return  $sql;
 }

 //  

//echo  dynamicQuery('1', '29023');


function dynamicQueryExample($ativo, $empresa){

  // #Filtro de Instâncias    
  $ativo = !empty($ativo) ? "AND usemp.ativo = '$ativo'" : "";
   #dynamic ativos inativos
  $empresa = !empty($empresa) ? " WHERE usemp.idEmpresa = '$empresa'" : "";
  

    $sql = "SELECT 
    usge.ID_Login_Usuario,
    usge.Login_Usuario,
    usge.Nome_Login,
    usge.idEmpresa,
    usge.z_sga_usuarios_id,
    usge.Cod_Usuario_ERP,
    usge.Nome_Usuario_ERP,
    usge.ID_Login_Gestor,
    usge.Login_Gestor,
    usge.Nome_Login_Gestor,
    al.idGestorAlternativo as ID_Login_Altern,
    lo3.login as Login_Altern,
    lo3.nomeUsuario as Nome_Login_Altern,
    al.dataInicio as dataInicio_Vig,
    al.dataFim as dataFim_Vig
  FROM
  (SELECT 
    uslo.idLogin as ID_Login_Usuario,
    uslo.login as Login_Usuario,
    uslo.Nome_Login,
    uslo.idEmpresa,
    uslo.z_sga_usuarios_id,
    uslo.Cod_Usuario_ERP,
    uslo.Nome_Usuario_ERP,
    lo2.idLogin as ID_Login_Gestor,
    lo2.Login as Login_Gestor,
    lo2.nomeUsuario as Nome_Login_Gestor
  FROM
  (SELECT 
    lo.idLogin,
    lo.login as Login,
    lo.nomeUsuario as Nome_Login,
    usemp.idEmpresa,
    us.z_sga_usuarios_id,
    us.cod_usuario as Cod_Usuario_ERP,
    us.nome_usuario as Nome_Usuario_ERP
    FROM z_sga_usuarios as us
    INNER JOIN z_sga_usuario_empresa as usemp
    ON us.z_sga_usuarios_id = usemp.idUsuario
    LEFT JOIN z_sga_param_login as lo
    ON usemp.idLogin = lo.idLogin
    $empresa 
    $ativo   
    ) as uslo
    LEFT JOIN z_sga_fluxo_v2_gestor_usuario as gu
    ON uslo.z_sga_usuarios_id=gu.idUsuario and uslo.idEmpresa=gu.idEmpresa 
    LEFT JOIN z_sga_param_login as lo2
    ON gu.idGestor=lo2.idLogin
    ) as usge
    LEFT JOIN z_sga_fluxo_v2_gestor_altarnativo as al
    ON usge.ID_Login_Gestor=al.idGestor and usge.idEmpresa=al.idEmpresa 
    LEFT JOIN z_sga_param_login as lo3
    ON al.idGestorAlternativo=lo3.idLogin
    WHERE 
    z_sga_usuarios_id IN (10)
    OR ID_Login_Gestor IN (2400)
    OR al.idGestorAlternativo IN (6966)";

    return nl2br($sql);
}

echo '<br>';
print_r(dynamicQueryExample('1', '6'));



?>