<div class="container">
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
</div>