<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

	$cakeDescription = __d('cake_dev', 'Storico Concerti');
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Un tool per gestire i concerti che si cucca Augusto">
    <meta name="author" content="Alessio Ludovico Bottiroli">
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('jquery-ui.custom.min');
    echo $this->Html->css('chosen.min');
		echo $this->Html->css('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?=$this->Html->link('Gigs History', array('controller' => 'gigs', 'action' => 'index'), array("class" => "navbar-brand"))?>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><?=$this->Html->link('Gigs', array('controller' => 'gigs', 'action' => 'index'))?></li>
            <li><?=$this->Html->link('Players', array('controller' => 'players', 'action' => 'index'))?></li>
            <li><?=$this->Html->link('Composers', array('controller' => 'composers', 'action' => 'index'))?></li>
            <li><?=$this->Html->link('Stats', array('controller' => 'stats', 'action' => 'index'))?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
      <div class="theContent">
		    <?php echo $this->fetch('content'); ?>
      </div>

    </div><!-- /.container -->

    <?php echo $this->element('sql_dump'); ?>
    <?php
      echo $this->Html->script('jquery.min');
      echo $this->Html->script('jquery-ui.custom.min');
		  echo $this->Html->script('bootstrap.min');
      echo $this->Html->script('chosen.jquery.min');
      echo $this->Html->script('jquery.raty.min');
    ?>
    <script>
      $(function() {
        $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

        <?php
          if(isset($gig['Gig']['rating']))
          {
        ?>
        $('#star').raty({ readOnly: true, score: <?=$gig['Gig']['rating']?>, path: '/gigsmanager/img/raty/' });
        <?php
          }
        ?>
        
        var config = {
          '.uses_chosen'           : {}
        }
        for (var selector in config) {
          $(selector).chosen(config[selector]);
        }

        $('#year').change(function() {
          window.location = '/gigsmanager/gigs/by_year/'+ $(this).val();
        });
        
      });
    </script>
</body>
</html>
