<?php
	
	function nav_array(){
		$nav_array = array(

			"1"=>array(
				"name"=>"Students",
				"icon"=>"fa fa-users",
				"sub_menu"=>array(
					"0"=>array(
						"name"=>"Students",
						"url"=>'admin/student',
					),
					"1"=>array(
						"name"=>"Enrolled Students",
						"url"=>'admin/student/view',
					),
					
				),
			),
			
			"2"=>array(
				"name"=>"Courses",
				"icon"=>"fa fa-book",
				"sub_menu"=>array(
					"0"=>array(
						"name"=>"Course",
						"url"=>'admin/course',
					),
					
				),
			),



		);

		return $nav_array;
	}

	
?>