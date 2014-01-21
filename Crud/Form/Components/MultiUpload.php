<?php namespace Mobileka\Crud\Form\Components;

class MultiUpload extends BaseComponent {

	protected $template = 'crud::form.multiupload';
	protected $featuredImageSelector = false;

	public function __get($name)
	{
		if ($name === 'files')
		{
			return $this->row->uploads;
		}

		return parent::__get($name);
	}

}