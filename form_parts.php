<?php
function input_text($element_name,$values){
	print '<input type="text" name="'.$element_name.'" value="';
	print htmlentities($values[$element_name]).'">';
}

function input_textarea($element_name,$values){
	print '<textarea name="'.$element_name.'">';
	print htmlentities($values[$element_name]).'</textarea>';
}

function input_radio($element_name,$values,$element_value){
	print '<input type="radio" name="'.$element_name.'" value="'.$element_value.'"';
	if(isset($values[$element_name]) && $element_value == $values[$element_name]){
		print ' checked="checked"';
	}
	print '>';
}

function input_check($element_name,$values,$element_value){
	$checked_options = array();
	if(isset($values[$element_name]) && $values[$element_name]!=''){
		foreach($values[$element_name] as $val){
			$checked_options[$val] = true;
		}
	}
	print '<input type="checkbox" name="'.$element_name.'[]" value="'.$element_value.'"';
	if(isset($checked_options[$element_value]) && ($checked_options[$element_value] == true)){
		print ' checked="checked"';
	}
	print '>';
}

function input_select($element_name,$selected,$options,$multiple = false){
	print '<select name="'.$element_name;
	if($multiple){print '[]" multiple="multiple';}
	print '">';
	$selected_options = array();
	if($selected[$element_name]!=''){
		if($multiple){
			foreach($selected[$element_name] as $val){
				$selected_options[$val] = true;
			}
		}else{
			$selected_options[$selected[$element_name]] = true;
		}
	}
	foreach($options as $val){
		print '<option value="'.htmlentities($val).'"';
		if(isset($selected_options[$val])){
			print ' selected="selected"';
		}
		print '>'.htmlentities($val).'</option>';
	}
	print '</select>';
}
?>