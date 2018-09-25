<?php

class teFaq extends BaseteFaq
{
	public function __toString()
	{
		return $this -> getQuestion();
	}
}
