<div>
    <div class="status-switch" id="snackbar-user-status">
        <label class="user-online current-status" style="pointer-events:none;">Status</label>
        <label class="user-invisible"  style="pointer-events:none;">
            @if ($response % 2 == 0)
                Indisponible
            @else
                Disponible
            @endif
        </label>
        <!-- Status Indicator -->
        <span class="status-indicator" aria-hidden="true"></span>
    </div> 
    <button wire:click="toggle" class="toggle-btn-status button ripple-effect" style="width:100%;margin-top:2px;">Changer</button>

</div>
