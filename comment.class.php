<?php

class Comment
{
    private $data = array();

    public function __construct($row)
    {
        /*
        /	The constructor
        */

        $this->data = $row;
    }

    public function markup()
    {
        /*
        /	This method outputs the XHTML markup of the comment
        */

        // Setting up an alias, so we don't have to write $this->data every time:
        $d = &$this->data;


        // Converting the time to a UNIX timestamp:
        $d['dt'] = strtotime($d['dt']);


        return '
			<div class="comment">
				<div class="name">' . $d['name'] . '</div>
				<div class="date" title="Added at ' . date('H:i \o\n d M Y', $d['dt']) . '">' . date('d M Y', $d['dt']) . '</div>
				<p>' . $d['body'] . '</p>
			</div>
		';
    }
}

?>