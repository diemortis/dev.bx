<?php

namespace Decorator;

use Service\Formatting\Formatter;

class BodyTextDecorator extends AbstractTextDecorator
{
	protected $title;
	protected $footer;

	public function format(string $text): string
	{
		$titleText = "<h1>".$this->title."</h1>";
		$footerText = "<h4>".$this->footer."</h4>";
		$this->text = $titleText.($this->formatter->format($text)).$footerText;
		return $this->text;
	}

	/**
	 * @return string
	 */
	public function getTitle(): string
	{
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getFooter(): string
	{
		return $this->footer;
	}

	/**
	 * @param string $footer
	 */
	public function setFooter(string $footer): void
	{
		$this->footer = $footer;
	}
}