<?php


class FunctionsController {
    
    
    /**
  * 
  * obter_nome_mes method
  * 
  * @param type $mesBase
  * @return string
  */   
    public function obter_nome_mes ( $mesBase ) {
        switch ($mesBase) {
            case '01':
                $nomeMes = 'Janeiro';    
                break;
            case '02':
                $nomeMes = 'Fevereiro';    
                break;
            case '03':
                $nomeMes = 'Março';    
                break;
            case '04':
                $nomeMes = 'Abril';    
                break;
            case '05':
                $nomeMes = 'Maio';    
                break;
            case '06':
                $nomeMes = 'Junho';    
                break;
            case '07':
                $nomeMes = 'Julho';    
                break;
            case '08':
                $nomeMes = 'Agosto';    
                break;
            case '09':
                $nomeMes = 'Setembro';    
                break;
            case '10':
                $nomeMes = 'Outubro';    
                break;
            case '11':
                $nomeMes = 'Novembro';    
                break;
            default:
                $nomeMes = 'Dezembro';
                break;
        }
        
        return $nomeMes;
    }
    
}

?>
