<?php namespace Mobileka\Crud\Grid\Filters;

use \Helpers\Arr;

class DropdownFilter extends BaseComponent {

	protected $template = 'crud::grid.filters.dropdown';

	public function value()
	{
		return Arr::searchRecursively($this->filters, 'where', $this->name);
	}

	public function options($options, $defaultValue = true)
	{
		if ($defaultValue)
		{
			$options = array(null => \Lang::findLine($this->languageFile, 'not_selected')) + $options;
		}

		$this->options = $options;

		return $this;
	}

}