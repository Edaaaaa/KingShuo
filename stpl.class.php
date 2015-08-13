<?php
	class stpl{
		private $vars=array();
		
		public function assign($name,$value){
			$this->vars[$name]=$value;	
		}
		
		public function display($tplname){
			//保存的路径+文件名
			$comfile="./comps/".$tplname.'.php';
			//html文件目录+文件名
			$tplname="./templates/$tplname";
			
			//有改动或不存在再生成
			if(!file_exists($comfile) || filemtime($tplname) > filemtime($comfile)){
				$html=file_get_contents($tplname);
				$role='/\{\s*\$([a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*)\s*\}/';
				$rep="<?php echo \$this->vars['\\1']; ?>";
				$newhtml=preg_replace($role,$rep,$html);
				
				file_put_contents($comfile,$newhtml);
			}
				include $comfile;
			
		}
		
		
		
		
		
	
	}


?>