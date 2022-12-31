<?php
/* Smarty version 4.2.1, created on 2022-11-01 13:05:38
  from 'C:\xampp\htdocs\phpTutorial\pages\phpTutorial\phpTutorial.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63610b92626159_32706133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '03e7766446ea9fb9f36eb548e5bf208d7d1e6d79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\phpTutorial\\phpTutorial.tpl',
      1 => 1667304336,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63610b92626159_32706133 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
<form method="post" action="">
    Farbe<br>
    <input type="text" name="color"><br><br>
    Blume<br>
    <input type="text" name="blume"><br><br>
    Promi<br>
    <input type="text" name="promi"><br><br>
    Password<br>
    <input type="password" name="password"><br><br>
    Früchte<br>
    Äpfel: <input type="checkbox" name="fruechte[]" value="Äpfel"><br>
    Bananen: <input type="checkbox" name="fruechte[]" value="Bananen"><br>
    Birnen: <input type="checkbox" name="fruechte[]" value="Birnen"><br>

    <input type="submit">
</form>
<?php echo $_smarty_tpl->tpl_vars['out']->value;?>

</div><?php }
}
