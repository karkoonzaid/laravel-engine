<?php
use Mobileka\Crud\Form\Components\TextArea;

$attributes = $component->attributes;
$attributes['class'] = (isset($component->attributes['class'])) ? $component->attributes['class'] . ' ckeditor' : 'ckeditor';
?>

{{ TextArea::make($component->name, $attributes)->row($component->row)->render() }}