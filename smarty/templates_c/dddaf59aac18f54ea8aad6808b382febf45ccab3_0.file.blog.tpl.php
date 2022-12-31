<?php
/* Smarty version 4.2.1, created on 2022-11-10 10:39:06
  from 'C:\xampp\htdocs\phpTutorial\pages\blog\blog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_636cc6ba0c53f4_57807479',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dddaf59aac18f54ea8aad6808b382febf45ccab3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\blog\\blog.tpl',
      1 => 1668072865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636cc6ba0c53f4_57807479 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <?php if ($_smarty_tpl->tpl_vars['aktion']->value && $_smarty_tpl->tpl_vars['aktion']->value == "show") {?>
        <h3 class="pb-4 mb-4 fst-italic border-bottom">Blog Beispiel</h3>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['blogData']->value, 'wert', false, 'schluessel');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schluessel']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
?>
            <article class="blog-post">
                <h2 class="blog-post-title mb-1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['titel'];?>

                    <a href="/blog?aktion=edit&id=<?php echo $_smarty_tpl->tpl_vars['schluessel']->value;?>
">
                        <svg class="bi" width="16" height="16" fill="currentColor">
                            <use xlink:href="/bootstrap/icons/bootstrap-icons.svg#pencil-square"/>
                        </svg>
                    </a>
                </h2>
                <p class="blog-post-meta">

                    <svg class="bi" width="16" height="16" fill="currentColor">
                        <use xlink:href="/bootstrap/icons/bootstrap-icons.svg#calendar3"/>
                    </svg>

                    <?php echo $_smarty_tpl->tpl_vars['wert']->value['datum'];?>
 von <?php echo $_smarty_tpl->tpl_vars['wert']->value['user'];?>
</p>
                <p><?php echo $_smarty_tpl->tpl_vars['wert']->value['text'];?>
</p>
                <hr>
            </article>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } elseif ($_smarty_tpl->tpl_vars['aktion']->value && ($_smarty_tpl->tpl_vars['aktion']->value == "edit" || $_smarty_tpl->tpl_vars['aktion']->value == "new")) {?>
        <form name="formBlog" id="formBlog" method="post" action="/blog" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-12">
                    <label for="titel" class="form-label">Titel</label>
                    <input type="text" class="form-control" id="titel" name="titel" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value['titel'];?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Titel ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="user" class="form-label">Author</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value['user'];?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Author ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="text" class="form-control" id="datum" name="datum" placeholder="" value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value['datum'];?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie das Datum und die Uhrzeit im Format DD.MM.YYYY HH:MM:SS ein.
                    </div>
                </div>

                <div class="col-12">
                    <label for="text" class="form-label">Artikel Text</label>
                    <textarea class="form-control" id="text" name="text" rows="4" cols="50" required><?php echo $_smarty_tpl->tpl_vars['blogData']->value['text'];?>
</textarea>
                    <div class="invalid-feedback">
                        Bitte tragen Sie den Artikel Text ein.
                    </div>
                </div>
                <hr class="my-4">


            </div>
            <div class="row g-3 divButton">
                <button type="submit" id="submitButton" class="w-25 btn btn-primary btn-lg">Speichern</button>
                <button type="button" id="addButton" class="w-25 btn btn-primary btn-lg">Neu</button>
                <button type="button" id="deleteButton" class="w-25 btn btn-danger btn-lg">Löschen</button>
            </div>
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value['id'];?>
" id="id" name="id">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['toaster']->value;?>
" id="toaster" name="toaster">
            <input type="hidden" value="save" id="aktion" name="aktion">

        </form>
    <?php }?>
</div>

<?php }
}
