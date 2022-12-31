<?php
/* Smarty version 4.2.1, created on 2022-11-17 11:28:46
  from 'C:\xampp\htdocs\phpTutorial\pages\Chat\Chat.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63760cde34a988_93830013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d9589f2cc03bd37048f8159fa7354a165a0e8cf' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\Chat\\Chat.tpl',
      1 => 1668680924,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63760cde34a988_93830013 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <form name="formChat" id="formChat">
        <div class="mb-3">
        <label for="chatContent" class="form-label">Textfenster:</label>
            <textarea class="form-control" id="chatContent" rows="4" cols="50" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">User:</label>
            <select  name="user" id="user" class="form-select">
                <option value="Peter">Peter</option>
                <option value="Frank">Frank</option>
            </select>
        </div>
        <div class="mb-3">
        <label for="myMessage" class="form-label">Deine Nachricht:</label>
            <input type="text" class="form-control" id="myMessage">
        </div>
        <button type="submit" id="submitButton" class="btn btn-primary">Absenden</button>
    </form>
</div><?php }
}
