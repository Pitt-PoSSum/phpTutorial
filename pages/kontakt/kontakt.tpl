<div class="container">
    {if $aktion && $aktion=="send"}
    <h3>Ihre Nachricht wurde gesendet</h3>
    <p class="lead"><b>Anrede:</b><br/>{$anrede}</p>
    <p class="lead"><b>Vorname:</b><br/>{$vorname}</p>
    <p class="lead"><b>Nachname:</b><br/>{$nachname}</p>
    <p class="lead"><b>e-mail:</b><br/>{$email}</p>
    <p class="lead"><b>Nachricht:</b><br/>{$nachricht}</p>
    {else}
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
    {/if}
</div>


