<div class="container">

        <h3 class="pb-4 mb-4 fst-italic border-bottom">Wordle</h3>

        <form name="formBlog" id="formBlog" method="post" action="/spiel" class="needs-validation" autocomplete="off" novalidate>
            {for $round=1 to 6}
                <div id="letterContainerRound{$round}" class="row g-3 letterContainer{if $round == 1} aktivWordle{/if}">

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter1R{$round}" name="letter1R{$round}" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter2R{$round}" name="letter2R{$round}" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter3R{$round}" name="letter3R{$round}" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter4R{$round}" name="letter4R{$round}" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <div class="col-sm-1">
                        <input type="text" class="form-control letterInput" id="letter5R{$round}" name="letter5R{$round}" autocomplete="off" placeholder="" value="" maxlength="1" required>
                    </div>

                    <hr class="my-4">
                </div>
            {/for}
            <div class="row g-3 divButton">
                <button type="button" id="checkButton" class="w-25 btn btn-primary btn-lg">prüfen</button>
                <button type="button" id="reloadButton" class="w-25 btn btn-primary btn-lg">nochmal</button>

            </div>

            <input type="hidden" value="{$toaster}" id="toaster" name="toaster">
            <input type="hidden" value="{$wort}" id="wort" name="wort">

        </form>

</div>

