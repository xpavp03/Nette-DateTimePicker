<?php
/**
 * RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example
 *
 * @package   RadekDostal\NetteComponents\DateTimePicker
 * @example   http://addons.nette.org/radekdostal/nette-datetimepicker
 * @author    Ing. Radek Dostál <radek.dostal@gmail.com>
 * @copyright Copyright (c) 2014 - 2015 Radek Dostál
 * @license   GNU Lesser General Public License
 * @link      http://www.radekdostal.cz
 */

use Nette\Forms\Form;
use Tracy\Debugger;

require '../vendor/autoload.php';

Debugger::$strictMode = TRUE;
Debugger::enable();

Form::extensionMethod('addTbDatePicker', function(Form $_this, $name, $label = NULL, $cols = NULL, $maxLength = NULL)
{
  return $_this[$name] = new RadekDostal\NetteComponents\DateTimePicker\TbDatePicker($label, $cols, $maxLength);
});

$form = new Form();

$form->getElementPrototype()->class('form-horizontal');

$form->addTbDatePicker('date', 'Date:', NULL, 10)
  //->setFormat('m/d/Y') // for en locale of moment.js
  ->setRequired()
  ->setAttribute('class', 'form-control');

$form->addSubmit('submit', 'Send')
  ->setAttribute('class', 'btn btn-default');

if ($form->isSuccess())
{
  echo '<h2>Form was submitted and successfully validated</h2>';

  Debugger::dump($form->getValues());
  exit;
}
/*else
{
  $form->setDefaults(array(
    'date' => date('d.m.Y')
  ));
}*/
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Radek Dostál">
  <title>RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="js/bootstrap/plugins/datetimepicker/css/bootstrap-datetimepicker.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.2.min.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment-with-locales.min.js"></script>
  <script type="text/javascript" src="js/bootstrap/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
  <script type="text/javascript">
    <!-- <![CDATA[
    $(document).ready(function()
    {
      $('.datepicker').datetimepicker(
      {
        pickTime: false,
        //language: 'en'
        language: 'cs'
      });
    });
    //]]> -->
  </script>
</head>
<body>
  <h1>RadekDostal\NetteComponents\DateTimePicker\TbDatePicker example</h1>
  <?php $form->render('begin'); ?>
  <?php if ($form->errors): ?>
  <ul class="error">
    <?php foreach ($form->errors as $error): ?>
    <li><?php echo htmlspecialchars($error) ?></li>
    <?php endforeach ?>
  </ul>
  <?php endif ?>
  <div class="form-group">
    <label for="date" class="control-label col-sm-3"><?php echo $form['date']->getLabel(); ?></label>
    <div class="col-sm-4 col-md-2">
      <div class="input-group datepicker">
        <?php echo $form['date']->getControl(); ?>
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <?php echo $form['submit']->getControl(); ?>
    </div>
  </div>
  <?php $form->render('end'); ?>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>