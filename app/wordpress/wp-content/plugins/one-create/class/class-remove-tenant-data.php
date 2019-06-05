<?php

class OA_Remove_Tenant_Data extends WP_Async_Request {
  protected function handle() {
		$this->build_lms_function( $_POST['id'],$_POST['lms_prefix'] );
	}

  public function clear_subsite_files_database($blog_id, $lms_prefix){
    $deleted_blog = get_blog_details($blog_id);
    $tenant_name = "{$this->lms_prefix}_".str_replace(".","_",$deleted_blog->domain);
    $data_dir = $tenant_name."_data";
    $command = _db_connection()."{$tenant_name} {$data_dir}";
    $this->_exec_script("clean_after_removal", $command);
  }


  /*
  *  Helper methods
  *  @author: MouMohsen
  */

  //Return current database connection details
  public function _db_connection(){
    return DB_HOST." ".DB_USER." ".DB_PASSWORD." ";
  }

  /*
  *  Execute bash scripts in bin directory
  * @param string $script_name Script name without extension
  * @param string $command command to run
  *  @author: MouMohsen
  */
  public function _exec_script($script_name, $command){
    $old_path = getcwd();
    $bin_dir = ABSPATH."../bin";
    chdir($bin_dir);
    $output = shell_exec("./{$script_name}.sh ".$command);
    chdir($old_path);
    return $output;
  }
}
