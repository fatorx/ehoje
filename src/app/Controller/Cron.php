<?php
/**
 * Realiza diversas tarefas em background no servidor
 *
 * 
 * @require Imagick
 * 
 * @author andre
 */
class Cron 
{
    
    public static function task() 
    {
        try{
            mail('andrecardosodev@gmail.com','cron Ehoje', 'Executou o cron');
            // redimensionando todas as imagens
            exec('mogrify -resize 128 *.jpg');
            exec('mogrify -resize 128 *.png');
        } catch (Exception $e) {
            mail('andrecardosodev@gmail.com','Erro no cron Ehoje', $e->getMessage());
        } 
    }
    
}

Cron::task();
