<?php
/* Smarty version 4.2.1, created on 2022-11-01 13:06:26
  from 'C:\xampp\htdocs\phpTutorial\pages\chatSocket\chatSocket.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_63610bc22ae0c0_53263199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5d58b0f1bb703caca2ad70d3532e862f485b5635' => 
    array (
      0 => 'C:\\xampp\\htdocs\\phpTutorial\\pages\\chatSocket\\chatSocket.tpl',
      1 => 1667304384,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_63610bc22ae0c0_53263199 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <form name="formChat" id="formChat">
        <div class="mb-3">
        <label for="chatContent" class="form-label">Textfenster:</label>
            <textarea class="form-control" id="chatContent" rows="4" cols="50" readonly></textarea>
        </div>
        <div class="mb-3">
            <label for="user" class="form-label">User:</label>
            <select  name="user" id="user">
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
