<?php
/* Smarty version 4.2.1, created on 2022-11-16 12:51:46
  from 'C:\xampp\htdocs\phpTutorial\pages\SoapClient\SoapClient.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_6374ced28ba4b4_10915747',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a590e52c9cf1c7ca741e5f23b37204eea67e837' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\SoapClient\\SoapClient.tpl',
      1 => 1668599356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6374ced28ba4b4_10915747 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">

    <h3 class="pb-4 mb-4 fst-italic border-bottom">SOAP Client Infos</h3>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getFunctions</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getFunctions']->value;?>
</pre>
        <hr>
    </article>

    
    <article class="blog-post">
        <h2 class="blog-post-title mb-1">setBlogData</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['setBlogData']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">deleteBlogData</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['deleteBlogData']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getMaxBlogId</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getMaxBlogId']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getAllBlogData</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getAllBlogData']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getBlogData</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getBlogData']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getLastRequestHeaders</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getLastRequestHeaders']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getLastRequest</h2>
        <xmp><?php echo $_smarty_tpl->tpl_vars['getLastRequest']->value;?>
</xmp>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getLastResponseHeaders</h2>
        <pre><?php echo $_smarty_tpl->tpl_vars['getLastResponseHeaders']->value;?>
</pre>
        <hr>
    </article>

    <article class="blog-post">
        <h2 class="blog-post-title mb-1">getLastResponse</h2>
        <xmp><?php echo $_smarty_tpl->tpl_vars['getLastResponse']->value;?>
</xmp>
        <hr>
    </article>

</div>

<?php }
}
