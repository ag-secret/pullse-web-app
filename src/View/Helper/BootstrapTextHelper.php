<?php

namespace App\View\Helper;

Use Cake\View\Helper;

class BootstrapTextHelper extends Helper
{

	public function labelBoolean($value, $textTrue, $textFalse)
	{
		if ($value) {
			return '<span class="label label-success">' .$textTrue. '</span>';
		}
		return '<span class="label label-danger">' .$textFalse. '</span>';
	}

}