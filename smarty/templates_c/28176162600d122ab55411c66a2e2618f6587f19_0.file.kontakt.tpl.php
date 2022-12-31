<?php
/* Smarty version 4.2.1, created on 2022-11-04 08:46:12
  from 'C:\xampp\htdocs\phpTutorial\pages\kontakt\kontakt.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6364c344d1b161_05242099',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '28176162600d122ab55411c66a2e2618f6587f19' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\kontakt\\kontakt.tpl',
      1 => 1667547972,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6364c344d1b161_05242099 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <?php if ($_smarty_tpl->tpl_vars['aktion']->value && $_smarty_tpl->tpl_vars['aktion']->value == "send") {?>
    <h3>Ihre Nachricht wurde gesendet</h3>
    <p class="lead"><b>Anrede:</b><br/><?php echo $_smarty_tpl->tpl_vars['anrede']->value;?>
</p>
    <p class="lead"><b>Vorname:</b><br/><?php echo $_smarty_tpl->tpl_vars['vorname']->value;?>
</p>
    <p class="lead"><b>Nachname:</b><br/><?php echo $_smarty_tpl->tpl_vars['nachname']->value;?>
</p>
    <p class="lead"><b>e-mail:</b><br/><?php echo $_smarty_tpl->tpl_vars['email']->value;?>
</p>
    <p class="lead"><b>Nachricht:</b><br/><?php echo $_smarty_tpl->tpl_vars['nachricht']->value;?>
</p>
    <?php } else { ?>
    <form name="formKontakt" id="formKontakt" method="post" action="" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-md-2">
                <label for="anrede" class="form-label">Anrede</label>
                <select name="anrede" id="anrede" class="form-select" required>
                    <option value="Herr">Herr</option>
                    <option value="Frau">Frau</option>
                </select>
            </div>
            <div class="w-100 d-none d-md-block"></div>

            <div class="col-sm-6">
                <label for="vorname" class="form-label">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Bitte tragen sie ihren Vornamen hier ein.
                </div>
            </div>

            <div class="col-sm-6">
                <label for="nachname" class="form-label">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" placeholder="" value="" required>
                <div class="invalid-feedback">
                    Bitte tragen sie ihren Nachnamen hier ein.
                </div>
            </div>


            <div class="col-12">
                <label for="email" class="form-label">e-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                    Bitte tragen sie ihren e-mail-Adresse hier ein
                </div>
            </div>

            <div class="col-12">
                <label for="nachricht" class="form-label">Ihre Nachricht</label>
                <textarea class="form-control" id="nachricht" name="nachricht" rows="4" cols="50" required></textarea>
                <div class="invalid-feedback">
                    Bitte hiterlassen sie mir eine Nachricht.
                </div>
            </div>
            <hr class="my-4">


        </div>
        <button type="submit" id="submitButton" class="w-100 btn btn-primary btn-lg">Absenden</button>
        <input type="hidden" value="send" id="aktion" name="aktion">

    </form>
    <?php }?>
</div>


<?php }
}
