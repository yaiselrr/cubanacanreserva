@if (session('success'))
    <div class="contenido">
        <div class="row">
            <div class="col-12" >
                <div id="toast-container" class="toast-top-right">
                    <div class="toast toast-success toastsDefaultAutohide" aria-live="polite" >
                        <div class="toast-message">{{ session('success') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif