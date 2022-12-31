<?php
/* Smarty version 4.2.1, created on 2022-11-15 09:00:48
  from 'C:\xampp\htdocs\phpTutorial\pages\spiel\spiel.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63734730ecd523_43641470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a07837ada513e4b022bf463c832517733e544fd7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\spiel\\spiel.tpl',
      1 => 1668499247,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63734730ecd523_43641470 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">Wordle</h3>

        <form name="formBlog" id="formBlog" method="post" action="/spiel" class="needs-validation" autocomplete="off" novalidate>
            <?php
$_smarty_tpl->tpl_vars['round'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['round']->step = 1;$_smarty_tpl->tpl_vars['round']->total = (int) ceil(($_smarty_tpl->tpl_vars['round']->step > 0 ? 6+1 - (1) : 1-(6)+1)/abs($_smarty_tpl->tpl_vars['round']->step));
if ($_smarty_tpl->tpl_vars['round']->total > 0) {
for ($_smarty_tpl->tpl_vars['round']->value = 1, $_smarty_tpl->tpl_vars['round']->iteration = 1;$_smarty_tpl->tpl_vars['round']->iteration <= $_smarty_tpl->tpl_vars['round']->total;$_smarty_tpl->tpl_vars['round']->value += $_smarty_tpl->tpl_vars['round']->step, $_smarty_tpl->tpl_vars['round']->iteration++) {
$_smarty_tpl->tpl_vars['round']->first = $_smarty_tpl->tpl_vars['round']->iteration === 1;$_smarty_tpl->tpl_vars['round']->last = $_smarty_tpl->tpl_vars['round']->iteration === $_smarty_tpl->tpl_vars['round']->total;?>
                <div id="letterContainerRound<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" class="row g-3 letterContainer<?php if ($_smarty_tpl->tpl_vars['round']->value == 1) {?> aktivWordle<?php }?>">

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter1R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" name="letter1R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter2R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" name="letter2R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter3R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" name="letter3R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter4R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" name="letter4R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter5R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" name="letter5R<?php echo $_smarty_tpl->tpl_vars['round']->value;?>
" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <hr class="my-4">
                </div>
            <?php }
}
?>
            <div class="row g-3 divButton">
                <button type="button" id="checkButton" class="w-25 btn btn-primary btn-lg">prüfen</button>
                <button type="button" id="reloadButton" class="w-25 btn btn-primary btn-lg">nochmal</button>

            </div>

            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['toaster']->value;?>
" id="toaster" name="toaster">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['wort']->value;?>
" id="wort" name="wort">

        </form>

</div>

<?php }
}
