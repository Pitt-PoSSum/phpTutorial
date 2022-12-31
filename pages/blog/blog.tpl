<div class="container">
    <form name="formBlog" id="formBlog" method="post" action="/blog" class="needs-validation" novalidate>
        <div class="row g-3">
            <div class="col-sm-2">
                <select class="form-select" name="useAPI" id="useAPI">
                    <option{if $useAPI==""} selected{/if}>konventionell</option>
                    <option value="SOAP"{if $useAPI=="SOAP"} selected{/if}>SOAP</option>
                    <option value="REST"{if $useAPI=="REST"} selected{/if}>REST</option>
                </select>
            </div>
            {if $useAPI=="SOAP"}
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#infoApiModal">
                        SOAP Info
                    </button>
                </div>
            {/if}
            {if $useAPI=="REST"}
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#infoApiModal">
                        REST Info
                    </button>
                </div>
            {/if}
            {if !$allBlogData}
                <div class="col-sm-2">
                    <button type="button" id="overview" class="btn btn-primary w-100">
                        Übersicht
                    </button>
                </div>
            {/if}
        </div>
        <hr>
        {if $allBlogData}
            {foreach key=schluessel item=wert from=$allBlogData}
                <article class="blog-post">
                    <h2 class="blog-post-title mb-1">{$wert.titel}
                        <a href="/blog?useAPI={$useAPI}&aktion=edit&id={$schluessel}">
                            <svg class="bi" width="16" height="16" fill="currentColor">
                                <use xlink:href="/bootstrap/icons/bootstrap-icons.svg#pencil-square"/>
                            </svg>
                        </a>
                    </h2>
                    <p class="blog-post-meta">

                        <svg class="bi" width="16" height="16" fill="currentColor">
                            <use xlink:href="/bootstrap/icons/bootstrap-icons.svg#calendar3"/>
                        </svg>

                        {$wert.datum} von {$wert.user}</p>
                    <p>{$wert.text}</p>
                    <hr>
                </article>
            {/foreach}
        {else}
            <div class="row g-3">
                <div class="col-12">
                    <label for="titel" class="form-label">Titel</label>
                    <input type="text" class="form-control" id="titel" name="titel" placeholder=""
                           value="{$blogData->titel}" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Titel ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="user" class="form-label">Author</label>
                    <input type="text" class="form-control" id="user" name="user" placeholder=""
                           value="{$blogData->user}" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie den Author ein.
                    </div>
                </div>

                <div class="col-sm-6">
                    <label for="datum" class="form-label">Datum</label>
                    <input type="text" class="form-control" id="datum" name="datum" placeholder=""
                           value="{$blogData->datum}" required>
                    <div class="invalid-feedback">
                        Bitte tragen sie das Datum und die Uhrzeit im Format DD.MM.YYYY HH:MM:SS ein.
                    </div>
                </div>

                <div class="col-12">
                    <label for="text" class="form-label">Artikel Text</label>
                    <textarea class="form-control" id="text" name="text" rows="4" cols="50"
                              required>{$blogData->text}</textarea>
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
            <input type="hidden" value="{$blogData->id}" id="id" name="id">
            <input type="hidden" value="{$toaster}" id="toaster" name="toaster">
            <input type="hidden" value="save" id="aktion" name="aktion">
        {/if}
    </form>
    <!-- Modal -->
    <div class="modal fade" id="infoApiModal" tabindex="-1" aria-labelledby="infoApiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoApiModalLabel">{$useAPI} Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {if !$infoDetails}
                        Keine {$useAPI} Informationen
                    {elseif $useAPI=="SOAP"}
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Details</h2>
                            <pre>{$infoDetails.getLastRequestHeaders}</pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Body</h2>
                            <xmp>{$infoDetails.getLastRequest}</xmp>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Header</h2>
                            <pre>{$infoDetails.getLastResponseHeaders}</pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response</h2>
                            <xmp>{$infoDetails.getLastResponse}</xmp>
                        </article>
                    {elseif $useAPI=="REST"}
                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Request Header</h2>
                            <pre>{foreach key=schluessel item=wert from=$infoDetails.requestHeader}{$schluessel}: {$wert}<br>{/foreach}</pre>
                        </article>

                        {if isset($infoDetails.requestBody)}
                            <article class="blog-post">
                                <h2 class="blog-post-title mb-1">Request Body</h2>
                                <xmp>{$infoDetails.requestBody}</xmp>
                            </article>
                        {/if}

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Header</h2>
                            <pre>{foreach key=schluessel item=wert from=$infoDetails.responseHeader}{$schluessel}: {$wert}<br>{/foreach}</pre>
                        </article>

                        <article class="blog-post">
                            <h2 class="blog-post-title mb-1">Response Body</h2>
                            <xmp>{$infoDetails.responseBody}</xmp>
                        </article>
                    {/if}
                </div>
            </div>
        </div>
    </div>
</div>

