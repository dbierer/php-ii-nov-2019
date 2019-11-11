<?php 

namespace AdminPanel\Entry;

class WebserverEntry extends AbstractEntry
{

	public function __toString() : string
	{
		return "TIME: ". $this->getLogTime." REQUEST: ". $this->getLog() . " FROM ". $this->getIP();
	}

}
