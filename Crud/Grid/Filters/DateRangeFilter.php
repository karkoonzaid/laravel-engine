<?php namespace Mobileka\Crud\Grid\Filters;

use \Helpers\Arr;

class DateRangeFilter extends BaseComponent {

	protected $template = 'crud::grid.filters.date_range';
	protected $from, $to;

	public static function make($name, $attributes = array())
	{
		$self = parent::make($name, $attributes);
		$self->from = $name;
		$self->to = $name;

		return $self;
	}

	public function fromValue()
	{
		return Arr::searchRecursively($this->filters, 'from', $this->from);
	}

	public function toValue()
	{
		return Arr::searchRecursively($this->filters, 'to', $this->to);
	}
}