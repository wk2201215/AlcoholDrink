<?php
class ViewCounter
{
    const SALT = 'hello_world.top1010';
    private $db_dir;
    private $log_dir;
    private $log_data_dir;
     
    function __construct($db_dir=null, $log_dir=null, $log_data_dir=null){
        //ログディレクトリ設定
        $this->db_dir     = is_null($db_dir)  ? dirname(__FILE__) . '/db/' : $db_dir;
        $this->log_dir    = is_null($log_dir) ? dirname(__FILE__) . '/log/' : $log_dir;
        $this->log_data_dir     = is_null($log_data_dir)  ? dirname(__FILE__) . '/log_data/' : $log_data_dir;
    }
 
    //IPをチェックしてカウントを増やす
    function log($id,$customer_id){
        $ip = date('Y-m-d_H:i:s_') . md5($this::SALT . $_SERVER['REMOTE_ADDR']).'_'.$customer_id;
        $ip_data = date('Y-m-d_H:i:s_') . md5($this::SALT . $_SERVER['REMOTE_ADDR']).'_'.$customer_id;

        $file = $this->log_dir . $id . '_' . md5($this::SALT . $id) . '.log';
        $file_data = $this->log_data_dir . $id . '_' . md5($this::SALT . $id) . '.log';

        $data = array();
        $flag = true;
        $data_data = array();

        $fp = fopen($file, 'a+b');
        $fp_data = fopen($file_data, 'a+b');

        flock($fp, LOCK_EX);
        flock($fp_data, LOCK_EX);
         
        //直近10000件までを読み込む
        for($i=0;$i<10000;$i++){
            if(feof($fp)) break;
            $line = fgets($fp);
            $logdata = array();
            $ipdata = array();
            $logdata = explode("_", rtrim($line));
            $ipdata = explode("_", $ip);
            if($ipdata[0] === $logdata[0] && $ipdata[3] === $logdata[3]){
                $flag = false;
                break;
            } else {
                $data[] = $line;
            }
        }
     
        if($flag){
            array_unshift($data, $ip . "\n");
            ftruncate ($fp, 0);
            rewind($fp);
            foreach($data as $value){
                fwrite($fp, $value);
            }
        }
        
        fflush($fp);
        flock($fp, LOCK_UN);
        fclose($fp);

        ftruncate ($fp_data, 0);
        rewind($fp_data);
        fwrite($fp_data, $ip."\n");

        fflush($fp_data);
        flock($fp_data, LOCK_UN);
        fclose($fp_data);
         
        if($flag){
            $count = $this->count_up($id);
        } else {
            $count = $this->get_count($id);
        }

        return $count;
    }
     
    //データベースのカウントを増やす
    function count_up($id, $num=1){
        $file = $this->db_dir . $id . '_' .md5($this::SALT . $id) . '.log';
        $file_data = $this->db_dir . $id . '_' .md5($this::SALT . $id) . '_2.log';
         
        if(file_exists($file)){
            $count = (int)file_get_contents($file);
        } else {
            $count = 0;
        }
        if(file_exists($file_data)){
            $count2 = (int)file_get_contents($file_data);
        } else {
            $count2 = 0;
        }
         
        if($num > 0){
            $count = $count + $num;
            file_put_contents( $file, $count, LOCK_EX );
        }
        $count2++;
        file_put_contents( $file_data, $count2, LOCK_EX );
        return $count;
    }
     
    //データベースのカウントを得る
    function get_count($id){
        $count = $this->count_up($id, 0);
        return $count;
    }
}