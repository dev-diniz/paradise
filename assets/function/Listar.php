<?php 
function ListarEstados (){ 
    $sql = 'select cd_estado, nm_estado, sg_estado from tb_estado order by nm_estado asc';
    $res = $GLOBALS['con']->query($sql);
    if($res->num_rows > 0){
        while($exibe = $res->fetch_array()){
            print'
                <option value="'.$exibe['cd_estado'].'" >'.$exibe['nm_estado'].'</option>
            ';
        }
    }
}


function ListarMarca (){ 
    $sql = 'select cd_marca, nm_marca from tb_marca order by nm_marca asc';
    $res = $GLOBALS['con']->query($sql);
    if($res->num_rows > 0){
        while($exibe = $res->fetch_array()){
            print'
                <option value="'.$exibe['cd_marca'].'" >'.$exibe['nm_marca'].'</option>
            ';
        }
    }
}
?>