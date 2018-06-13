<?php
/* Smarty version 3.1.29, created on 2017-10-09 09:50:43
  from "/usr/share/zabbix/oneoaas/templates/header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59dad5f350f7b5_55155090',
  'file_dependency' => 
  array (
    '04bf82d822c03c3f5298a06c771d88d5dbf6a35d' => 
    array (
      0 => '/usr/share/zabbix/oneoaas/templates/header.tpl',
      1 => 1507513713,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59dad5f350f7b5_55155090 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="../oneoaas/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../oneoaas/assets/css/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../oneoaas/assets/css/animate.min.css" rel="stylesheet">
    <link href="../oneoaas/assets/css/custom.css" rel="stylesheet">
    <?php if ($_smarty_tpl->tpl_vars['page']->value['css']) {?>
        <?php
$_from = $_smarty_tpl->tpl_vars['page']->value['css'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_css_0_saved_item = isset($_smarty_tpl->tpl_vars['css']) ? $_smarty_tpl->tpl_vars['css'] : false;
$_smarty_tpl->tpl_vars['css'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['css']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['css']->value) {
$_smarty_tpl->tpl_vars['css']->_loop = true;
$__foreach_css_0_saved_local_item = $_smarty_tpl->tpl_vars['css'];
?>
            <link href="../<?php echo $_smarty_tpl->tpl_vars['css']->value;?>
" rel="stylesheet" type="text/css">
        <?php
$_smarty_tpl->tpl_vars['css'] = $__foreach_css_0_saved_local_item;
}
if ($__foreach_css_0_saved_item) {
$_smarty_tpl->tpl_vars['css'] = $__foreach_css_0_saved_item;
}
?>
    <?php }?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"><?php echo '</script'; ?>
>
    <![endif]-->

</head><body class="nav-md"><?php }
}
