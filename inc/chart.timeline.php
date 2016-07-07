<?
	//==========================================================================================
	class dbWebGenChart_timeline extends dbWebGenChart_Google {
	//==========================================================================================
		
		//--------------------------------------------------------------------------------------
		// form field @name must be prefixed with exact charttype followed by dash
		public function settings_html() { 
		//--------------------------------------------------------------------------------------
			return <<<HTML
			<p>A timeline chart.</p>
HTML;
		}
		
		//--------------------------------------------------------------------------------------
		public function add_required_scripts() {			
		//--------------------------------------------------------------------------------------
			parent::add_required_scripts();
		}		
		
		//--------------------------------------------------------------------------------------
		// need to override this because of material options conversion
		public function before_draw_js() {
		//--------------------------------------------------------------------------------------
			return '';
		}
		
		//--------------------------------------------------------------------------------------
		public /*string*/ function data_to_js(&$row, $row_nr) {
		//--------------------------------------------------------------------------------------
			return parent::data_to_js($row, $row_nr);
			
			$r = '';
			if($row_nr === 0) // first row => render headers
				$r .= json_encode(array_keys($row)) . ",\n";				
			
			return $r . json_encode(array_values($row), JSON_NUMERIC_CHECK) . ",\n";
		}
		
		//--------------------------------------------------------------------------------------
		protected function options() {			
		//--------------------------------------------------------------------------------------
			return parent::options() + array(
			);
		}
		
		//--------------------------------------------------------------------------------------
		// return google charts class name to instantiate
		public function class_name() {
		//--------------------------------------------------------------------------------------
			return 'google.visualization.Timeline';
		}
		
		//--------------------------------------------------------------------------------------
		// return google charts packages to include
		public function packages() {
		//--------------------------------------------------------------------------------------
			return array('timeline');
		}
	};
?>