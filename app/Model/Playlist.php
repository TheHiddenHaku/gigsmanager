<?php
	class Playlist extends AppModel
	{
		public $belongsTo = array("Composer", "Gig");
	}