@if($message)
    <style>.sweetalert{ bottom: 10%; }</style>
    <div class="sweetalert z-50 flex items-center justify-end gap-4 bg-action p-4 rounded-l-lg fixed right-0 shadow">
        <div class="space-y-1 text-sm">
            <h6 class="font-medium text-white">Message</h6>
            <p class="leading-tight text-white">{{ $message }}</p>
        </div>
    </div>
    <script>$(document).ready(function(){ $(".sweetalert").delay(2000).slideUp(300); });</script>
@endif