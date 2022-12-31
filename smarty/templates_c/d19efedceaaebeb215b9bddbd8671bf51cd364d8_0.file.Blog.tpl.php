<?php
/* Smarty version 4.2.1, created on 2022-11-30 11:55:09
  from 'C:\xampp\htdocs\phpTutorial\pages\Blog\Blog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6387368d360cb6_22571797',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd19efedceaaebeb215b9bddbd8671bf51cd364d8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\Blog\\Blog.tpl',
      1 => 1669805709,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6387368d360cb6_22571797 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <form name="formBlog" id="formBlog" method="post" action="/blog" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-sm-2">
                <select class="form-select" name="useAPI" id="useAPI">
                    <option<?php if ($_smarty_tpl->tpl_vars['useAPI']->value == '') {?> selected<?php }?>>konventionell</option>
                    <option value="SOAP"<?php if ($_smarty_tpl->tpl_vars['useAPI']->value == "SOAP") {?> selected<?php }?>>SOAP</option>
                    <option value="REST"<?php if ($_smarty_tpl->tpl_vars['useAPI']->value == "REST") {?> selected<?php }?>>REST</option>
                </select>
            </div>
            <?php if ($_smarty_tpl->tpl_vars['useAPI']->value == "SOAP") {?>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#infoApiModal">
                        SOAP Info
                    </button>
                </div>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['useAPI']->value == "REST") {?>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#infoApiModal">
                        REST Info
                    </button>
                </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['allBlogData']->value) {?>
                <div class="col-sm-2">
                    <button type="button" id="overview" class="btn btn-primary w-100">
                        Übersicht
                    </button>
                </div>
            <?php }?>
        </div>
        <hr>
        <?php if ($_smarty_tpl->tpl_vars['allBlogData']->value) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allBlogData']->value, 'wert', false, 'schluessel');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schluessel']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
?>
                <article class="blog-post">
                    <h2 class="blog-post-title mb-1"><?php echo $_smarty_tpl->tpl_vars['wert']->value['titel'];?>

                        <a href="/blog?useAPI=<?php echo $_smarty_tpl->tpl_vars['useAPI']->value;?>
&aktion=edit&id=<?php echo $_smarty_tpl->tpl_vars['schluessel']->value;?>
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
        <?php } else { ?>
            <div class="row g-3">
                <div class="col-12">
                    <label for="titel" class="form-label">Titel</label>
                    <input type="text" class="form-control" id="titel" name="titel" placeholder=""
                           value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value->titel;?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Titel ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="user" class="form-label">Author</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder=""
                           value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value->user;?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Author ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="text" class="form-control" id="datum" name="datum" placeholder=""
                           value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value->datum;?>
" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie das Datum und die Uhrzeit im Format DD.MM.YYYY HH:MM:SS ein.
                    </div>
                </div>

                <div class="col-12">
                    <label for="text" class="form-label">Artikel Text</label>
                    <textarea class="form-control" id="text" name="text" rows="4" cols="50"
                              required><?php echo $_smarty_tpl->tpl_vars['blogData']->value->text;?>
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
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['blogData']->value->id;?>
" id="id" name="id">
            <input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['toaster']->value;?>
" id="toaster" name="toaster">
            <input type="hidden" value="save" id="aktion" name="aktion">
        <?php }?>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="infoApiModal" tabindex="-1" aria-labelledby="infoApiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoApiModalLabel"><?php echo $_smarty_tpl->tpl_vars['useAPI']->value;?>
 Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (!$_smarty_tpl->tpl_vars['infoDetails']->value) {?>
                        Keine <?php echo $_smarty_tpl->tpl_vars['useAPI']->value;?>
 Informationen
                    <?php } elseif ($_smarty_tpl->tpl_vars['useAPI']->value == "SOAP") {?>
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Details</h2>
                            <pre><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['getLastRequestHeaders'];?>
</pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Body</h2>
                            <xmp><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['getLastRequest'];?>
</xmp>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Header</h2>
                            <pre><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['getLastResponseHeaders'];?>
</pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response</h2>
                            <xmp><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['getLastResponse'];?>
</xmp>
                        </article>
                    <?php } elseif ($_smarty_tpl->tpl_vars['useAPI']->value == "REST") {?>
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Header</h2>
                            <pre><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infoDetails']->value['requestHeader'], 'wert', false, 'schluessel');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schluessel']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
echo $_smarty_tpl->tpl_vars['schluessel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['wert']->value;?>
<br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></pre>
                        </article>

                        <?php if ((isset($_smarty_tpl->tpl_vars['infoDetails']->value['requestBody']))) {?>
                            <article class="blog-post">
                                <h2 class="blog-post-title mb-1">Request Body</h2>
                                <xmp><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['requestBody'];?>
</xmp>
                            </article>
                        <?php }?>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Header</h2>
                            <pre><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infoDetails']->value['responseHeader'], 'wert', false, 'schluessel');
$_smarty_tpl->tpl_vars['wert']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['schluessel']->value => $_smarty_tpl->tpl_vars['wert']->value) {
$_smarty_tpl->tpl_vars['wert']->do_else = false;
echo $_smarty_tpl->tpl_vars['schluessel']->value;?>
: <?php echo $_smarty_tpl->tpl_vars['wert']->value;?>
<br><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Body</h2>
                            <xmp><?php echo $_smarty_tpl->tpl_vars['infoDetails']->value['responseBody'];?>
</xmp>
                        </article>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php }
}
